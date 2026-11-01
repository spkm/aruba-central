<?php

use Carbon\CarbonImmutable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Saloon\Http\Faking\MockResponse;
use spkm\ArubaCentral\Classic\ClassicToken;
use spkm\ArubaCentral\Classic\Query;
use spkm\ArubaCentral\Classic\Requests\RefreshTokenRequest;
use spkm\ArubaCentral\Classic\TokenStore\CacheTokenStore;
use spkm\ArubaCentral\Classic\TokenStore\FileTokenStore;
use spkm\ArubaCentral\Exceptions\ServerErrorException;
use spkm\ArubaCentral\Exceptions\UnauthorizedException;
use spkm\ArubaCentral\Tests\Fixtures\ExampleClassicListRequest;
use spkm\ArubaCentral\Tests\Helpers\FakeCentral;
use spkm\ArubaCentral\Tests\Helpers\FakeClassic;

afterEach(fn () => Carbon::setTestNow());

it('talks to the API gateway without a prefix', function () {
    $connector = FakeClassic::connector();

    expect($connector->resolveBaseUrl())->toBe(FakeClassic::BASE_URL)
        ->and($connector->side())->toBe('classic')
        ->and($connector->newQuery())->toBeInstanceOf(Query::class);
});

it('refreshes the seed token in the query string before the first request and stores the new pair', function () {
    $store = new CacheTokenStore;
    $mockClient = FakeClassic::respondWithToken([ExampleClassicListRequest::class => FakeClassic::list([], 'aps')]);
    $connector = FakeClassic::connector($store, authenticated: false);

    expect($mockClient->getRecordedResponses())->toBeEmpty();

    $connector->send(new ExampleClassicListRequest);
    $connector->send(new ExampleClassicListRequest);

    $refresh = FakeCentral::received($mockClient, RefreshTokenRequest::class);
    expect(FakeCentral::urisReceived($mockClient, RefreshTokenRequest::class))->toBe([FakeClassic::BASE_URL.'/oauth2/token?client_id=client&client_secret=secret&grant_type=refresh_token&refresh_token=seed-refresh'])
        ->and($refresh->getMethod()->value)->toBe('POST')
        ->and($refresh->headers()->get('Content-Type'))->toBe('application/json')
        ->and($refresh->body())->toBeNull()
        ->and(FakeCentral::urisReceived($mockClient, ExampleClassicListRequest::class))->toHaveCount(2)
        ->and(FakeCentral::lastAuthorization($mockClient, ExampleClassicListRequest::class))->toBe('Bearer issued-token')
        ->and($connector->token()?->accessToken)->toBe('issued-token')
        ->and($connector->token()?->refreshToken)->toBe('issued-refresh')
        ->and($connector->token()?->expiresAt->getTimestamp())->toBe(now()->addSeconds(7200)->getTimestamp());
});

it('uses the stored pair while it has time left, and refreshes with its refresh token once it is expiring', function () {
    $store = new CacheTokenStore;
    $mockClient = FakeClassic::respondWithToken([ExampleClassicListRequest::class => FakeClassic::list([], 'aps')], FakeClassic::token('second', 'second-refresh'));
    $connector = FakeClassic::connector($store);

    $connector->send(new ExampleClassicListRequest);
    expect(FakeCentral::urisReceived($mockClient, RefreshTokenRequest::class))->toBeEmpty()
        ->and(FakeCentral::lastAuthorization($mockClient, ExampleClassicListRequest::class))->toBe('Bearer fake-token');

    Carbon::setTestNow(now()->addHours(2)->subSeconds(30));
    $connector->send(new ExampleClassicListRequest);

    expect(FakeCentral::urisReceived($mockClient, RefreshTokenRequest::class))->toBe([FakeClassic::BASE_URL.'/oauth2/token?client_id=client&client_secret=secret&grant_type=refresh_token&refresh_token=fake-refresh'])
        ->and(FakeCentral::lastAuthorization($mockClient, ExampleClassicListRequest::class))->toBe('Bearer second')
        ->and($connector->token()?->refreshToken)->toBe('second-refresh');
});

it('picks up a pair another process stored instead of spending its own refresh token', function () {
    $store = new CacheTokenStore;
    $mockClient = FakeClassic::respondWithToken([ExampleClassicListRequest::class => FakeClassic::list([], 'aps')]);
    $connector = FakeClassic::connector($store);
    $connector->send(new ExampleClassicListRequest);

    Carbon::setTestNow(now()->addHours(2)->subSeconds(30));
    $store->put(sha1(FakeClassic::BASE_URL.'|client'), new ClassicToken('elsewhere', 'elsewhere-refresh', CarbonImmutable::now()->addHours(2)));
    $connector->send(new ExampleClassicListRequest);

    expect(FakeCentral::urisReceived($mockClient, RefreshTokenRequest::class))->toBeEmpty()
        ->and(FakeCentral::lastAuthorization($mockClient, ExampleClassicListRequest::class))->toBe('Bearer elsewhere');
});

it('refreshes and sends again, once, when classic answers 401', function () {
    $mockClient = FakeClassic::respondWith([
        RefreshTokenRequest::class => FakeClassic::token('fresh', 'fresh-refresh'),
        ExampleClassicListRequest::class => MockResponse::make('', 401),
    ]);
    $connector = FakeClassic::connector();

    $response = $connector->send(new ExampleClassicListRequest);

    expect($response->status())->toBe(401)
        ->and(FakeCentral::urisReceived($mockClient, ExampleClassicListRequest::class))->toHaveCount(2)
        ->and(FakeCentral::urisReceived($mockClient, RefreshTokenRequest::class))->toHaveCount(1)
        ->and(FakeCentral::lastAuthorization($mockClient, ExampleClassicListRequest::class))->toBe('Bearer fresh')
        ->and($connector->token()?->refreshToken)->toBe('fresh-refresh');
});

it('forgets a pair the gateway refuses and says how to start again', function () {
    $store = new CacheTokenStore;
    FakeClassic::respondWith([RefreshTokenRequest::class => MockResponse::make(['error' => 'invalid_grant', 'error_description' => 'Invalid refresh token'], 400)]);
    $connector = FakeClassic::connector($store, authenticated: false);

    expect(fn () => $connector->send(new ExampleClassicListRequest))
        ->toThrow(UnauthorizedException::class, 'Aruba Central responded 400 to POST /oauth2/token: invalid_grant; Invalid refresh token');

    FakeClassic::respondWith([RefreshTokenRequest::class => MockResponse::make('', 401)]);
    $connector = FakeClassic::connector($store);
    Carbon::setTestNow(now()->addHours(3));
    expect(fn () => $connector->send(new ExampleClassicListRequest))->toThrow(UnauthorizedException::class)
        ->and($connector->token())->toBeNull();

    FakeClassic::respondWith([RefreshTokenRequest::class => MockResponse::make('', 503)]);
    expect(fn () => FakeClassic::connector(authenticated: false)->refreshToken())->toThrow(ServerErrorException::class);

    expect(fn () => FakeClassic::connector(authenticated: false, seed: null)->send(new ExampleClassicListRequest))
        ->toThrow(InvalidArgumentException::class, 'needs a refresh_token');

    FakeClassic::respondWith([RefreshTokenRequest::class => MockResponse::make(['token_type' => 'bearer'])]);
    expect(fn () => FakeClassic::connector(authenticated: false)->refreshToken())->toThrow(UnauthorizedException::class);
});

it('forgets its stored pair on request and starts again from the seed', function () {
    $mockClient = FakeClassic::respondWithToken([ExampleClassicListRequest::class => FakeClassic::list([], 'aps')]);
    $connector = FakeClassic::connector();

    $connector->forgetToken();
    expect($connector->token())->toBeNull();
    $connector->send(new ExampleClassicListRequest);

    expect(FakeCentral::urisReceived($mockClient, RefreshTokenRequest::class))->toHaveCount(1)
        ->and(FakeCentral::urisReceived($mockClient, RefreshTokenRequest::class)[0])->toContain('refresh_token=seed-refresh');
});

it('keeps the pair encrypted in a file, written atomically, or in the cache', function () {
    $directory = sys_get_temp_dir().'/aruba-central-'.uniqid();
    $store = new FileTokenStore($directory);
    $token = new ClassicToken('access', 'refresh', CarbonImmutable::createFromTimestamp(1_900_000_000));

    expect($store->get('k'))->toBeNull();
    $store->put('k', $token);
    $files = glob($directory.'/*');

    expect($files)->toHaveCount(1)
        ->and($files[0])->toEndWith('/k.token')
        ->and(file_get_contents($files[0]))->not->toContain('access')
        ->and(json_decode(Crypt::decryptString((string) file_get_contents($files[0])), true))->toBe($token->toArray())
        ->and($store->get('k'))->toEqual($token)
        ->and($store->get('../k'))->toEqual($token)
        ->and(decoct(fileperms($files[0]) & 0777))->toBe('600');

    file_put_contents($files[0], 'garbage');
    expect($store->get('k'))->toBeNull();

    $store->forget('k');
    expect(glob($directory.'/*'))->toBe([])->and($store->get('k'))->toBeNull();
    $store->forget('k');

    $cache = new CacheTokenStore;
    expect($cache->get('k'))->toBeNull();
    $cache->put('k', $token);
    expect($cache->get('k'))->toEqual($token)
        ->and(json_encode(app('cache')->store('array')->getStore()->all()))->not->toContain('access');
    Cache::put('aruba.classic.token.k', 'garbage');
    expect($cache->get('k'))->toBeNull();
    $cache->forget('k');
    expect(Cache::has('aruba.classic.token.k'))->toBeFalse();

    expect(ClassicToken::from(['access_token' => 'a', 'refresh_token' => 'r', 'expires_at' => 'soon']))->toBeNull()
        ->and(ClassicToken::from(['access_token' => '', 'refresh_token' => 'r', 'expires_at' => 1]))->toBeNull()
        ->and($token->isExpiring())->toBeFalse()
        ->and((new ClassicToken('a', 'r', CarbonImmutable::now()->addSeconds(59)))->isExpiring())->toBeTrue();

    array_map('unlink', glob($directory.'/*') ?: []);
    rmdir($directory);
});
