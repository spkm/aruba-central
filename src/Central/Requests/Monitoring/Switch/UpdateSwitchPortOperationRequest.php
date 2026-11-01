<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Switch;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Monitoring\PortUpdate;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update switch port operation: POST /network-monitoring/v1/switches/{serial-number}/update-port.
 *
 * Body: action, operation, ports.
 */
class UpdateSwitchPortOperationRequest extends WriteRequest
{
    protected ?string $dto = PortUpdate::class;

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
        return '/network-monitoring/v1/switches/'.rawurlencode((string) $this->serialNumber).'/update-port';
    }
}
