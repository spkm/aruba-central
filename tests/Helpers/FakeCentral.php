<?php

namespace spkm\ArubaCentral\Tests\Helpers;

use Saloon\Http\Auth\AccessTokenAuthenticator;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use Saloon\Http\PendingRequest;
use Saloon\Http\Request;
use Saloon\Http\Response;
use spkm\ArubaCentral\Central\CentralConnector;

class FakeCentral
{
    public const BASE_URL = 'https://de3.api.central.example.test';

    public const TOKEN_URL = 'https://sso.example.test/as/token.oauth2';

    /**
     * Fake Central: each request class answers with the given response.
     *
     * @param  array<class-string<Request>|string, MockResponse|callable(PendingRequest): MockResponse>  $responses
     */
    public static function respondWith(array $responses = []): MockClient
    {
        MockClient::destroyGlobal();

        return MockClient::global($responses);
    }

    /**
     * A connector that already holds a token, so a test that isn't about tokens needs no token response.
     */
    public static function connector(string $clientId = 'client', string $clientSecret = 'secret', string $baseUrl = self::BASE_URL, bool $authenticated = true): CentralConnector
    {
        $connector = new CentralConnector($clientId, $clientSecret, $baseUrl, self::TOKEN_URL);

        if ($authenticated) {
            $connector->authenticate(new AccessTokenAuthenticator('fake-token'));
        }

        return $connector;
    }

    /**
     * GreenLake's answer to the token request.
     */
    public static function token(string $accessToken = 'issued-token', int $expiresIn = 7200): MockResponse
    {
        return MockResponse::make(['access_token' => $accessToken, 'token_type' => 'Bearer', 'expires_in' => $expiresIn]);
    }

    /**
     * @param  array<class-string<Request>|string, MockResponse|callable(PendingRequest): MockResponse>  $responses
     */
    public static function respondWithToken(array $responses = [], ?MockResponse $token = null): MockClient
    {
        return self::respondWith([GetClientCredentialsTokenRequest::class => $token ?? self::token(), ...$responses]);
    }

    /**
     * A page of records as new Central sends it: {"items": [...], "count": n, "total": n, "next": "2"}.
     *
     * @param  list<array<string, mixed>>  $items
     * @param  array<string, mixed>  $more
     */
    public static function list(array $items, ?int $total = null, ?string $next = null, array $more = [], int $status = 200): MockResponse
    {
        $body = ['items' => $items, 'count' => count($items), 'total' => $total ?? count($items), 'next' => $next, ...$more];

        return MockResponse::make($body, $status);
    }

    /**
     * New Central's error body.
     */
    public static function error(int $status, string $code, string $message, array $headers = []): MockResponse
    {
        return MockResponse::make(['httpStatusCode' => $status, 'errorCode' => $code, 'message' => $message, 'debugId' => 'debug-1'], $status, $headers);
    }

    /**
     * Send one request through a connector to a faked Central that answers it with the given body.
     *
     * @param  array<mixed>|string  $body
     * @param  array<string, string>  $headers
     */
    public static function send(Request $request, array|string $body = [], int $status = 200, array $headers = []): Response
    {
        self::respondWith([$request::class => MockResponse::make($body, $status, $headers)]);

        return self::connector()->send($request);
    }

    /**
     * The request Central received for the given request class, as Saloon built it.
     *
     * @param  class-string<Request>  $requestClass
     */
    public static function received(MockClient $mockClient, string $requestClass): PendingRequest
    {
        return $mockClient->findResponseByRequest($requestClass)->getPendingRequest();
    }

    /**
     * The query strings Central received for every request of the given class, in the order they were sent.
     *
     * @param  class-string<Request>  $requestClass
     * @return list<array<string, mixed>>
     */
    public static function queriesReceived(MockClient $mockClient, string $requestClass): array
    {
        return collect($mockClient->getRecordedResponses())
            ->filter(fn (Response $response) => $response->getRequest() instanceof $requestClass)
            ->map(fn (Response $response) => $response->getPendingRequest()->query()->all())
            ->values()
            ->all();
    }

    /**
     * The URIs Central received for every request of the given class, as sent on the wire.
     *
     * @param  class-string<Request>  $requestClass
     * @return list<string>
     */
    public static function urisReceived(MockClient $mockClient, string $requestClass): array
    {
        return collect($mockClient->getRecordedResponses())
            ->filter(fn (Response $response) => $response->getRequest() instanceof $requestClass)
            ->map(fn (Response $response) => (string) $response->getPsrRequest()->getUri())
            ->values()
            ->all();
    }

    /**
     * The JSON bodies Central received for every request of the given class.
     *
     * @param  class-string<Request>  $requestClass
     * @return list<mixed>
     */
    public static function bodiesReceived(MockClient $mockClient, string $requestClass): array
    {
        return collect($mockClient->getRecordedResponses())
            ->filter(fn (Response $response) => $response->getRequest() instanceof $requestClass)
            ->map(fn (Response $response) => json_decode((string) $response->getPsrRequest()->getBody(), true))
            ->values()
            ->all();
    }

    /**
     * The Authorization header of the last request of the given class.
     *
     * @param  class-string<Request>  $requestClass
     */
    public static function lastAuthorization(MockClient $mockClient, string $requestClass): ?string
    {
        $response = collect($mockClient->getRecordedResponses())->filter(fn (Response $response) => $response->getRequest() instanceof $requestClass)->last();

        return $response?->getPendingRequest()->headers()->get('Authorization');
    }
}
