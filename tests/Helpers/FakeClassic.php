<?php

namespace spkm\ArubaCentral\Tests\Helpers;

use Carbon\CarbonImmutable;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\PendingRequest;
use Saloon\Http\Request;
use Saloon\Http\Response;
use spkm\ArubaCentral\Classic\ClassicConnector;
use spkm\ArubaCentral\Classic\ClassicToken;
use spkm\ArubaCentral\Classic\Requests\RefreshTokenRequest;
use spkm\ArubaCentral\Classic\TokenStore\CacheTokenStore;
use spkm\ArubaCentral\Classic\TokenStore\TokenStore;

class FakeClassic
{
    public const BASE_URL = 'https://apigw-eucentral3.central.example.test';

    /**
     * @param  array<class-string<Request>|string, MockResponse|callable(PendingRequest): MockResponse>  $responses
     */
    public static function respondWith(array $responses = []): MockClient
    {
        return FakeCentral::respondWith($responses);
    }

    /**
     * A connector whose store already holds a token with time left, so a test that isn't about tokens needs no
     * token response.
     */
    public static function connector(?TokenStore $store = null, bool $authenticated = true, ?string $seed = 'seed-refresh', string $clientId = 'client'): ClassicConnector
    {
        $store ??= new CacheTokenStore;
        $connector = new ClassicConnector($clientId, 'secret', self::BASE_URL, $store, $seed);

        if ($authenticated) {
            $store->put(sha1(self::BASE_URL.'|'.$clientId), new ClassicToken('fake-token', 'fake-refresh', CarbonImmutable::now()->addHours(2)));
        }

        return $connector;
    }

    /**
     * Classic Central's answer to a refresh.
     */
    public static function token(string $accessToken = 'issued-token', string $refreshToken = 'issued-refresh', int $expiresIn = 7200): MockResponse
    {
        return MockResponse::make(['access_token' => $accessToken, 'refresh_token' => $refreshToken, 'token_type' => 'bearer', 'expires_in' => $expiresIn]);
    }

    /**
     * @param  array<class-string<Request>|string, MockResponse|callable(PendingRequest): MockResponse>  $responses
     */
    public static function respondWithToken(array $responses = [], ?MockResponse $token = null): MockClient
    {
        return self::respondWith([RefreshTokenRequest::class => $token ?? self::token(), ...$responses]);
    }

    /**
     * A page of records as classic Central sends it: {"count": n, "total": n, "aps": [...]}.
     *
     * @param  list<array<string, mixed>>  $items
     * @param  array<string, mixed>  $more
     */
    public static function list(array $items, string $key = 'items', ?int $total = null, array $more = [], int $status = 200): MockResponse
    {
        $body = ['count' => count($items), $key => $items, ...$more];

        if ($total !== null) {
            $body['total'] = $total;
        }

        return MockResponse::make($body, $status);
    }

    /**
     * Classic Central's error body.
     */
    public static function error(int $status, string $code, string $description, string $service = 'monitoring', array $headers = []): MockResponse
    {
        return MockResponse::make(['service_name' => $service, 'error_code' => $code, 'description' => $description], $status, $headers);
    }

    /**
     * Send one request through a connector to a faked classic Central that answers it with the given body.
     *
     * @param  array<mixed>|string  $body
     * @param  array<string, string>  $headers
     */
    public static function send(Request $request, array|string $body = [], int $status = 200, array $headers = []): Response
    {
        self::respondWith([$request::class => MockResponse::make($body, $status, $headers)]);

        return self::connector()->send($request);
    }
}
