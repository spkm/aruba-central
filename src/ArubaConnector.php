<?php

namespace spkm\ArubaCentral;

use GuzzleHttp\Promise\PromiseInterface;
use JsonSerializable;
use Saloon\Config;
use Saloon\Enums\Method;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Connector;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\Traits\Plugins\HasTimeout;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\AdhocBodyRequest;
use spkm\ArubaCentral\Requests\AdhocRequest;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Resources\AdhocResource;

/**
 * What a connection to either Central shares: timeouts and retries from config, a token fetched before the first
 * request and again after a 401, paging, and ad-hoc calls for anything the package has no request for.
 */
abstract class ArubaConnector extends Connector implements HasPagination
{
    use HasTimeout;

    protected float $connectTimeout;

    protected float $requestTimeout;

    public function __construct(protected string $baseUrl)
    {
        $this->connectTimeout = (float) config('aruba.timeouts.connect', Config::$defaultConnectionTimeout);
        $this->requestTimeout = (float) config('aruba.timeouts.request', Config::$defaultRequestTimeout);

        if (config('aruba.retries.times')) {
            $this->tries = (int) config('aruba.retries.times');
            $this->retryInterval = (int) config('aruba.retries.interval_ms', 500);
            $this->useExponentialBackoff = true;
            $this->throwOnMaxTries = false;
        }
    }

    /**
     * Which API this is: "central" or "classic".
     */
    abstract public function side(): string;

    /**
     * An empty query that writes parameters the way this API reads them.
     */
    abstract public function newQuery(): Query;

    /**
     * Hold a valid token before sending a request that needs one.
     */
    abstract protected function ensureAuthenticated(Request $request): void;

    /**
     * Fetch a new token after Central refused the one held.
     */
    abstract protected function reauthenticate(): void;

    /**
     * Whether the request is the one that fetches a token, which needs none itself.
     */
    abstract protected function isTokenRequest(Request $request): bool;

    public function resolveBaseUrl(): string
    {
        return rtrim($this->baseUrl, '/');
    }

    /**
     * The API gateway's address as configured.
     */
    public function baseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @return array<string, string>
     */
    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
        ];
    }

    public function send(Request $request, ?MockClient $mockClient = null, ?callable $handleRetry = null): Response
    {
        $this->ensureAuthenticated($request);

        $response = parent::send($request, $mockClient, $handleRetry);

        if ($response->status() === 401 && config('aruba.reauthenticate', true) && ! $this->isTokenRequest($request)) {
            $this->reauthenticate();

            return parent::send($request, $mockClient, $handleRetry);
        }

        return $response;
    }

    public function sendAsync(Request $request, ?MockClient $mockClient = null): PromiseInterface
    {
        $this->ensureAuthenticated($request);

        return parent::sendAsync($request, $mockClient);
    }

    /**
     * Retry only a request that changes nothing, and only for a fault on Central's side or the way there.
     */
    public function handleRetry(FatalRequestException|RequestException $exception, Request $request): bool
    {
        $isSafe = $request instanceof ArubaRequest ? $request->isSafe() : $request->getMethod() === Method::GET;

        if (! $isSafe) {
            return false;
        }

        return $exception instanceof FatalRequestException
            || in_array($exception->getResponse()->status(), [408, 429], true)
            || $exception->getResponse()->serverError();
    }

    /**
     * Page through a list request, $perPage records at a time (aruba.pagination.per_page by default, or fewer where
     * the endpoint allows fewer).
     */
    public function paginate(Request $request, ?int $perPage = null): ArubaPaginator
    {
        return new ArubaPaginator($this, $request, $perPage ?? (int) config('aruba.pagination.per_page', 100));
    }

    /**
     * A query over an endpoint the package has no resource for, as Aruba::from('/path'); its records are arrays,
     * read from under $resultKey and paged by offset.
     *
     * @return Builder<Data>
     */
    public function from(string $path, string $resultKey = 'items', ?string $totalKey = 'total'): Builder
    {
        return new AdhocResource($this, $path, $resultKey, $totalKey);
    }

    /**
     * @param  array<string, mixed>  $query
     */
    public function get(string $path, array $query = []): Response
    {
        return $this->send(new AdhocRequest(Method::GET, $path, $query));
    }

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $query
     */
    public function post(string $path, array|JsonSerializable $body = [], array $query = []): Response
    {
        return $this->send(new AdhocBodyRequest(Method::POST, $path, $body, $query));
    }

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $query
     */
    public function put(string $path, array|JsonSerializable $body = [], array $query = []): Response
    {
        return $this->send(new AdhocBodyRequest(Method::PUT, $path, $body, $query));
    }

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $query
     */
    public function patch(string $path, array|JsonSerializable $body = [], array $query = []): Response
    {
        return $this->send(new AdhocBodyRequest(Method::PATCH, $path, $body, $query));
    }

    /**
     * @param  array<string, mixed>  $query
     */
    public function delete(string $path, array $query = []): Response
    {
        return $this->send(new AdhocRequest(Method::DELETE, $path, $query));
    }
}
