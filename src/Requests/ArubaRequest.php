<?php

namespace spkm\ArubaCentral\Requests;

use Illuminate\Support\Facades\Cache;
use JsonException;
use Saloon\CachePlugin\Contracts\Cacheable;
use Saloon\CachePlugin\Contracts\Driver;
use Saloon\CachePlugin\Drivers\LaravelCacheDriver;
use Saloon\CachePlugin\Traits\HasCaching;
use Saloon\Enums\Method;
use Saloon\Http\PendingRequest;
use Saloon\Http\Request;
use Saloon\Http\Response;
use spkm\ArubaCentral\ArubaApiException;
use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Exceptions\ServerErrorException;
use spkm\ArubaCentral\Support\Payload;

/**
 * What every request to Central shares: the shape of the response and the model it maps to (for dto()), where in
 * the body the records are, and optional response caching.
 */
abstract class ArubaRequest extends Request implements Cacheable
{
    use HasCaching;

    public const ONE = 'one';

    public const LIST = 'list';

    public const RAW = 'raw';

    public const NONE = 'none';

    /**
     * The key the records are under in the response: "items" for a new Central list, "aps" or "data" and the like
     * for classic, '' for a bare record or list.
     */
    public string $resultKey = '';

    protected string $responseShape = self::NONE;

    /** @var class-string<Data>|null */
    protected ?string $dto = null;

    protected bool $cacheable = false;

    protected bool $safe = true;

    public function resolveCacheDriver(): Driver
    {
        return new LaravelCacheDriver(Cache::store(config('aruba.cache.store')));
    }

    public function cacheExpiryInSeconds(): int
    {
        return (int) config('aruba.cache.seconds', 3600);
    }

    /**
     * @return array<Method>
     */
    protected function getCacheableMethods(): array
    {
        return $this->cacheable && config('aruba.cache.enabled') ? [Method::GET] : [];
    }

    protected function cacheKey(PendingRequest $pendingRequest): string
    {
        $connector = $pendingRequest->getConnector();
        $side = $connector instanceof ArubaConnector ? $connector->side().' '.$connector->resolveBaseUrl() : '';

        return 'aruba.response.'.sha1($side.' '.$pendingRequest->getMethod()->value.' '.$pendingRequest->getUri());
    }

    /**
     * Whether the request can be retried: a GET that changes nothing.
     */
    public function isSafe(): bool
    {
        return $this->safe && $this->getMethod() === Method::GET;
    }

    /**
     * @return class-string<Data>|null
     */
    public function dtoClass(): ?string
    {
        return $this->dto;
    }

    public function responseShape(): string
    {
        return $this->responseShape;
    }

    /**
     * The response as the request's model (or models, or arrays for a request without one), null for an answer
     * without a body (204, 202 with nothing to say), or an ArubaApiException for an error.
     */
    public function createDtoFromResponse(Response $response): mixed
    {
        if (! $response->successful()) {
            throw ArubaApiException::fromResponse($response);
        }

        if (trim($response->body()) === '') {
            return null;
        }

        try {
            return match ($this->responseShape) {
                self::ONE => Payload::object($response, $this->resultKey, $this->dto),
                self::LIST => Payload::items($response, $this->resultKey, $this->dto),
                self::RAW => Payload::json($response),
                default => null,
            };
        } catch (JsonException) {
            // A successful status with something other than JSON, such as a proxy's or maintenance page.
            throw new ServerErrorException($response);
        }
    }
}
