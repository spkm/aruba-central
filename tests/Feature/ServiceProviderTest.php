<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use spkm\ArubaCentral\ArubaService;
use spkm\ArubaCentral\ArubaServiceProvider;
use spkm\ArubaCentral\Central\CentralConnector;
use spkm\ArubaCentral\Classic\ClassicConnector;
use spkm\ArubaCentral\Classic\TokenStore\CacheTokenStore;
use spkm\ArubaCentral\Classic\TokenStore\FileTokenStore;
use spkm\ArubaCentral\Facades\Aruba;
use spkm\ArubaCentral\Tests\Fixtures\ExampleListRequest;
use spkm\ArubaCentral\Tests\Helpers\FakeCentral;
use spkm\ArubaCentral\Tests\Helpers\FakeClassic;

function configureCentral(): void
{
    config()->set('aruba.central', ['base_url' => 'https://de3.api.central.school.test/', 'client_id' => 'id', 'client_secret' => 'secret', 'token_url' => FakeCentral::TOKEN_URL]);
}

function configureClassic(): void
{
    config()->set('aruba.classic', ['base_url' => 'https://apigw-eucentral3.central.school.test/', 'client_id' => 'id', 'client_secret' => 'secret', 'refresh_token' => 'seed', 'token_store' => 'cache', 'token_path' => null]);
}

it('binds the service as a singleton behind the facade', function () {
    expect(app('aruba'))->toBeInstanceOf(ArubaService::class)
        ->and(app('aruba'))->toBe(app('aruba'))
        ->and(Aruba::getFacadeRoot())->toBe(app('aruba'));
});

it('loads the config with its environment names', function () {
    expect(config('aruba'))->toHaveKeys(['central', 'classic', 'connections', 'timeouts', 'retries', 'reauthenticate', 'cache', 'pagination'])
        ->and(config('aruba.central'))->toHaveKeys(['base_url', 'client_id', 'client_secret', 'token_url'])
        ->and(config('aruba.classic'))->toHaveKeys(['base_url', 'client_id', 'client_secret', 'refresh_token', 'token_store', 'token_path'])
        ->and(config('aruba.central.token_url'))->toBe(CentralConnector::TOKEN_URL)
        ->and(config('aruba.pagination.per_page'))->toBe(100)
        ->and(file_get_contents(__DIR__.'/../../config/aruba.php'))->toContain("env('ARUBA_BASE_URL')", "env('ARUBA_CLIENT_ID')", "env('ARUBA_CLIENT_SECRET')", "env('ARUBA_CLASSIC_BASE_URL')", "env('ARUBA_CLASSIC_CLIENT_ID')", "env('ARUBA_CLASSIC_CLIENT_SECRET')", "env('ARUBA_CLASSIC_REFRESH_TOKEN')", "env('ARUBA_RETRIES')", "env('ARUBA_CACHE', false)");
});

it('registers the install command and the config to publish', function () {
    $paths = ServiceProvider::pathsToPublish(ArubaServiceProvider::class, 'aruba-config');

    expect(Artisan::all())->toHaveKey('aruba:install')
        ->and($paths)->toHaveCount(1)
        ->and(realpath((string) array_key_first($paths)))->toBe(realpath(__DIR__.'/../../config/aruba.php'))
        ->and(array_values($paths)[0])->toBe(config_path('aruba.php'));
});

it('talks to new Central by default and builds the connector from config the first time it is used', function () {
    configureCentral();
    $mockClient = FakeCentral::respondWithToken([ExampleListRequest::class => FakeCentral::list([])]);

    Aruba::send(new ExampleListRequest);

    expect(FakeCentral::received($mockClient, ExampleListRequest::class)->getUrl())->toBe('https://de3.api.central.school.test/example')
        ->and(FakeCentral::received($mockClient, ExampleListRequest::class)->headers()->get('Authorization'))->toBe('Bearer issued-token')
        ->and(Aruba::central())->toBeInstanceOf(CentralConnector::class)
        ->and(Aruba::central())->toBe(Aruba::central())
        ->and(Aruba::central()->resolveBaseUrl())->toBe('https://de3.api.central.school.test');
});

it('gives classic Central its own connector, with the configured token store', function () {
    configureClassic();
    $mockClient = FakeClassic::respondWithToken([ExampleListRequest::class => FakeClassic::list([])]);

    $classic = Aruba::classic();
    $classic->send(new ExampleListRequest);

    expect($classic)->toBeInstanceOf(ClassicConnector::class)
        ->and($classic)->toBe(Aruba::classic())
        ->and($classic->resolveBaseUrl())->toBe('https://apigw-eucentral3.central.school.test')
        ->and($classic->tokenStore())->toBeInstanceOf(CacheTokenStore::class)
        ->and(FakeCentral::received($mockClient, ExampleListRequest::class)->headers()->get('Authorization'))->toBe('Bearer issued-token');

    config()->set('aruba.classic.token_store', 'file');
    config()->set('aruba.classic.token_path', sys_get_temp_dir().'/aruba-test');
    $store = (new ArubaService)->classic()->tokenStore();
    expect($store)->toBeInstanceOf(FileTokenStore::class)->and($store->directory())->toBe(sys_get_temp_dir().'/aruba-test');

    config()->set('aruba.classic.token_store', 'file');
    config()->set('aruba.classic.token_path', null);
    expect((new ArubaService)->classic()->tokenStore()->directory())->toBe(storage_path('app/aruba-central'));

    config()->set('aruba.classic.token_store', CacheTokenStore::class);
    expect((new ArubaService)->classic()->tokenStore())->toBeInstanceOf(CacheTokenStore::class);

    config()->set('aruba.classic.token_store', 'nonsense');
    expect(fn () => (new ArubaService)->classic())->toThrow(InvalidArgumentException::class, '"nonsense" is not a token store');
});

it('says which setting a connection is missing', function (string $side, string $setting) {
    configureCentral();
    configureClassic();
    config()->set("aruba.$side.$setting", '');
    $name = $side === 'central' ? 'new Central' : 'classic Central';

    expect(fn () => $side === 'central' ? Aruba::central() : Aruba::classic())->toThrow(InvalidArgumentException::class, "The default $name connection needs a $setting.");
})->with([
    ['central', 'base_url'], ['central', 'client_id'], ['central', 'client_secret'],
    ['classic', 'base_url'], ['classic', 'client_id'], ['classic', 'client_secret'],
]);

it('gives a named connection its own connectors, once', function () {
    config()->set('aruba.connections.other', [
        'central' => ['base_url' => 'https://us1.api.central.other.test', 'client_id' => 'other', 'client_secret' => 'other-secret'],
        'classic' => ['base_url' => 'https://apigw-prod2.central.other.test', 'client_id' => 'other', 'client_secret' => 'other-secret', 'refresh_token' => 'seed'],
    ]);

    expect(Aruba::connection('other'))->toBeInstanceOf(CentralConnector::class)
        ->and(Aruba::connection('other'))->toBe(Aruba::central('other'))
        ->and(Aruba::connection('other')->resolveBaseUrl())->toBe('https://us1.api.central.other.test')
        ->and(Aruba::classic('other'))->toBeInstanceOf(ClassicConnector::class)
        ->and(Aruba::classic('other'))->toBe(Aruba::classic('other'))
        ->and(Aruba::classic('other')->resolveBaseUrl())->toBe('https://apigw-prod2.central.other.test')
        ->and(fn () => Aruba::connection('missing'))->toThrow(InvalidArgumentException::class, 'No Aruba connection named "missing"')
        ->and(fn () => Aruba::classic('missing'))->toThrow(InvalidArgumentException::class, 'No Aruba connection named "missing"');

    config()->set('aruba.connections.half', ['central' => ['base_url' => 'https://x.test', 'client_id' => 'x', 'client_secret' => 'x']]);
    expect(fn () => Aruba::classic('half'))->toThrow(InvalidArgumentException::class, 'The classic Central connection "half" needs a base_url.');
});

it('refuses a method neither it nor the connector has', function () {
    configureCentral();

    expect(fn () => Aruba::nonsense())->toThrow(BadMethodCallException::class);
});
