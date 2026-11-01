<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Troubleshooting\AsyncOperationStatus;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Initiate a Http test on a CX Switch: POST /network-troubleshooting/v1/cx/{serial-number}/http.
 *
 * Body: protocol, destination, vrfName, sourceInterface, sourcePort, nameServer.
 */
class InitiateCxHttpRequest extends WriteRequest
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
        return '/network-troubleshooting/v1/cx/'.rawurlencode((string) $this->serialNumber).'/http';
    }
}
