<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use spkm\ArubaCentral\ArubaPaginator;
use spkm\ArubaCentral\Central\Query;
use spkm\ArubaCentral\Exceptions\UnauthorizedException;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Requests\AdhocBodyRequest;
use spkm\ArubaCentral\Requests\AdhocListRequest;
use spkm\ArubaCentral\Requests\AdhocRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleCreateRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleItemRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleListRequest;
use spkm\ArubaCentral\Tests\Helpers\FakeCentral;

afterEach(fn () => Carbon::setTestNow());

it('talks to the API gateway without a prefix', function () {
    $connector = FakeCentral::connector(baseUrl: 'https://de3.api.central.school.test/');

    expect($connector->resolveBaseUrl())->toBe('https://de3.api.central.school.test')
        ->and($connector->baseUrl())->toBe('https://de3.api.central.school.test/')
        ->and($connector->side())->toBe('central')
        ->and($connector->newQuery())->toBeInstanceOf(Query::class)
        ->and($connector->headers()->get('Accept'))->toBe('application/json');
});

it('fetches a token from GreenLake as a form before the first request, not when it is built', function () {
    $mockClient = FakeCentral::respondWithToken([ExampleListRequest::class => FakeCentral::list([])]);
    $connector = FakeCentral::connector(authenticated: false);

    expect($mockClient->getRecordedResponses())->toBeEmpty();

    $connector->send(new ExampleListRequest);
    $connector->send(new ExampleListRequest);

    $token = FakeCentral::received($mockClient, GetClientCredentialsTokenRequest::class);
    expect(FakeCentral::urisReceived($mockClient, GetClientCredentialsTokenRequest::class))->toBe([FakeCentral::TOKEN_URL])
        ->and($token->getMethod()->value)->toBe('POST')
        ->and($token->headers()->get('Content-Type'))->toBe('application/x-www-form-urlencoded')
        ->and($token->body()?->all())->toBe(['grant_type' => 'client_credentials', 'client_id' => 'client', 'client_secret' => 'secret'])
        ->and(collect($mockClient->getRecordedResponses())->filter(fn ($r) => $r->getRequest() instanceof GetClientCredentialsTokenRequest))->toHaveCount(1)
        ->and(FakeCentral::received($mockClient, ExampleListRequest::class)->headers()->get('Authorization'))->toBe('Bearer issued-token');
});

it('caches the token, encrypted, for other connectors until a minute before it expires', function () {
    FakeCentral::respondWithToken([ExampleListRequest::class => FakeCentral::list([])], FakeCentral::token('cached-token', 3600));
    FakeCentral::connector(authenticated: false)->send(new ExampleListRequest);

    $stored = collect(app('cache')->store('array')->getStore()->all())->first();

    expect($stored)->toBeArray()
        ->and(json_decode(Crypt::decryptString($stored['value']), true))->toMatchArray(['access_token' => 'cached-token'])
        ->and(json_encode($stored))->not->toContain('cached-token');

    $mockClient = FakeCentral::respondWith([ExampleListRequest::class => FakeCentral::list([])]);
    FakeCentral::connector(authenticated: false)->send(new ExampleListRequest);

    expect(FakeCentral::received($mockClient, ExampleListRequest::class)->headers()->get('Authorization'))->toBe('Bearer cached-token');
});

it('fetches a new token once the one it holds is a minute from expiring', function () {
    $mockClient = FakeCentral::respondWith([
        GetClientCredentialsTokenRequest::class => FakeCentral::token('first', 120),
        ExampleListRequest::class => FakeCentral::list([]),
    ]);
    $connector = FakeCentral::connector(authenticated: false);

    $connector->send(new ExampleListRequest);
    Carbon::setTestNow(now()->addSeconds(61));
    Cache::flush();
    $mockClient->addResponses([GetClientCredentialsTokenRequest::class => FakeCentral::token('second', 7200)]);
    $connector->send(new ExampleListRequest);

    expect(FakeCentral::urisReceived($mockClient, GetClientCredentialsTokenRequest::class))->toHaveCount(2)
        ->and(FakeCentral::lastAuthorization($mockClient, ExampleListRequest::class))->toBe('Bearer second');
});

it('fetches a new token and sends again, once, when Central answers 401', function () {
    $mockClient = FakeCentral::respondWith([
        GetClientCredentialsTokenRequest::class => FakeCentral::token('fresh'),
        ExampleListRequest::class => FakeCentral::error(401, 'HPE_GL_ERROR_UNAUTHORIZED', 'Unauthorized'),
    ]);
    $connector = FakeCentral::connector();

    $response = $connector->send(new ExampleListRequest);

    expect($response->status())->toBe(401)
        ->and(FakeCentral::urisReceived($mockClient, ExampleListRequest::class))->toHaveCount(2)
        ->and(FakeCentral::urisReceived($mockClient, GetClientCredentialsTokenRequest::class))->toHaveCount(1)
        ->and(FakeCentral::lastAuthorization($mockClient, ExampleListRequest::class))->toBe('Bearer fresh');

    config()->set('aruba.reauthenticate', false);
    $mockClient = FakeCentral::respondWith([ExampleListRequest::class => MockResponse::make([], 401)]);
    FakeCentral::connector()->send(new ExampleListRequest);
    expect(FakeCentral::urisReceived($mockClient, ExampleListRequest::class))->toHaveCount(1);
});

it('forgets its token on request', function () {
    $mockClient = FakeCentral::respondWithToken([ExampleListRequest::class => FakeCentral::list([])]);
    $connector = FakeCentral::connector();

    $connector->forgetToken();
    $connector->send(new ExampleListRequest);

    expect(FakeCentral::urisReceived($mockClient, GetClientCredentialsTokenRequest::class))->toHaveCount(1);
});

it('describes a refused client', function () {
    FakeCentral::respondWith([GetClientCredentialsTokenRequest::class => MockResponse::make(['error' => 'invalid_client', 'error_description' => 'The client credentials are invalid'], 400)]);

    expect(fn () => FakeCentral::connector(authenticated: false)->send(new ExampleListRequest))
        ->toThrow(UnauthorizedException::class, 'Aruba Central responded 400 to POST /as/token.oauth2: invalid_client; The client credentials are invalid');
});

it('takes its timeouts and retries from config', function () {
    config()->set('aruba.timeouts', ['connect' => 3, 'request' => 7]);
    config()->set('aruba.retries', ['times' => 3, 'interval_ms' => 1]);
    $connector = FakeCentral::connector();

    expect($connector->getConnectTimeout())->toBe(3.0)
        ->and($connector->getRequestTimeout())->toBe(7.0)
        ->and($connector->tries)->toBe(3);
});

it('retries a GET, not a write, on a connection failure or a server error', function () {
    config()->set('aruba.retries', ['times' => 3, 'interval_ms' => 1]);
    $mockClient = FakeCentral::respondWith([
        ExampleItemRequest::class => MockResponse::make([], 503),
        ExampleCreateRequest::class => MockResponse::make([], 503),
    ]);
    $connector = FakeCentral::connector();

    expect($connector->send(new ExampleItemRequest(1))->status())->toBe(503)
        ->and(FakeCentral::urisReceived($mockClient, ExampleItemRequest::class))->toHaveCount(3)
        ->and($connector->send(new ExampleCreateRequest(['name' => 'x']))->status())->toBe(503)
        ->and(FakeCentral::urisReceived($mockClient, ExampleCreateRequest::class))->toHaveCount(1);

    $mockClient = FakeCentral::respondWith([ExampleItemRequest::class => MockResponse::make([], 429)]);
    expect($connector->send(new ExampleItemRequest(1))->status())->toBe(429)
        ->and(FakeCentral::urisReceived($mockClient, ExampleItemRequest::class))->toHaveCount(3);

    $mockClient = FakeCentral::respondWith([ExampleItemRequest::class => MockResponse::make([], 404)]);
    expect($connector->send(new ExampleItemRequest(1))->status())->toBe(404)
        ->and(FakeCentral::urisReceived($mockClient, ExampleItemRequest::class))->toHaveCount(1);

    $mockClient = FakeCentral::respondWith([ExampleItemRequest::class => fn () => throw new FatalRequestException(new RuntimeException('down'), FakeCentral::received($mockClient, ExampleItemRequest::class))]);
    expect(fn () => $connector->send(new ExampleItemRequest(1)))->toThrow(FatalRequestException::class);
});

it('sends ad-hoc calls by method and path and gives a builder over any path', function () {
    $mockClient = FakeCentral::respondWith([
        AdhocRequest::class => MockResponse::make(['ok' => true]),
        AdhocBodyRequest::class => MockResponse::make(['id' => 1]),
        AdhocListRequest::class => FakeCentral::list([['id' => 1]]),
    ]);
    $connector = FakeCentral::connector();

    expect($connector->get('/network-monitoring/v1/thing', ['site-id' => 7])->json())->toBe(['ok' => true])
        ->and($connector->post('network-monitoring/v1/thing', ['name' => 'x'])->json())->toBe(['id' => 1])
        ->and($connector->put('/thing/1', ['name' => 'y'])->status())->toBe(200)
        ->and($connector->patch('/thing/1', ['name' => 'z'])->status())->toBe(200)
        ->and($connector->delete('/thing/1')->status())->toBe(200)
        ->and(FakeCentral::urisReceived($mockClient, AdhocRequest::class)[0])->toBe(FakeCentral::BASE_URL.'/network-monitoring/v1/thing?site-id=7')
        ->and(FakeCentral::bodiesReceived($mockClient, AdhocBodyRequest::class)[0])->toBe(['name' => 'x'])
        ->and($connector->from('/network-monitoring/v1/thing'))->toBeInstanceOf(Builder::class)
        ->and($connector->from('/network-monitoring/v1/thing')->where('siteId', 7)->get()->all())->toBe([['id' => 1]])
        ->and(FakeCentral::queriesReceived($mockClient, AdhocListRequest::class)[0])->toBe(['filter' => 'siteId eq 7'])
        ->and($connector->paginate(new ExampleListRequest))->toBeInstanceOf(ArubaPaginator::class);
});
