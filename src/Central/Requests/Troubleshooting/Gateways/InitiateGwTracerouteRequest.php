<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Troubleshooting\AsyncOperationStatus;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Initiate a Traceroute test on a Gateway: POST /network-troubleshooting/v1/gateways/{serial-number}/traceroute.
 *
 * Body: destination, vlanIp, includeRawOutput.
 */
class InitiateGwTracerouteRequest extends WriteRequest
{
    protected ?string $dto = AsyncOperationStatus::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/traceroute';
    }
}
