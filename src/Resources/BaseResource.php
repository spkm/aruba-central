<?php

namespace spkm\ArubaCentral\Resources;

use JsonException;
use spkm\ArubaCentral\ArubaApiException;
use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Exceptions\NotFoundException;
use spkm\ArubaCentral\Exceptions\ServerErrorException;
use spkm\ArubaCentral\Requests\ArubaRequest;

/**
 * What every resource shares: its connector, the model its records are returned as, and sending a request for its
 * model.
 *
 * @template TData of Data
 */
abstract class BaseResource
{
    /**
     * @param  class-string<TData>|null  $dataClass  The model records are returned as; null for arrays.
     */
    public function __construct(protected ArubaConnector $connector, protected ?string $dataClass) {}

    public function connector(): ArubaConnector
    {
        return $this->connector;
    }

    /**
     * Send a request and return what Central answered as the request's model, throwing for an error status.
     */
    protected function fetch(ArubaRequest $request): mixed
    {
        $response = $this->connector->send($request);

        if (! $response->successful()) {
            throw ArubaApiException::fromResponse($response);
        }

        try {
            return $response->dto();
        } catch (JsonException) {
            throw new ServerErrorException($response);
        }
    }

    /**
     * As fetch(), but null when Central has no such record.
     */
    protected function fetchOrNull(ArubaRequest $request): mixed
    {
        try {
            return $this->fetch($request);
        } catch (NotFoundException) {
            return null;
        }
    }

    /**
     * @param  array<string, mixed>|Data  $attributes
     * @return array<string, mixed>
     */
    protected function payloadOf(array|Data $attributes): array
    {
        return $attributes instanceof Data ? $attributes->toArray() : $attributes;
    }
}
