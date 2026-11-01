<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GatewayPort;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Gateway port detail: GET /network-monitoring/v1/gateways/{serial-number}/ports/{port-number}.
 *
 * Query options: start-at, end-at.
 */
class GetGatewayPortDetailRequest extends ItemRequest
{
    protected ?string $dto = GatewayPort::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $portNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/ports/'.rawurlencode((string) $this->portNumber);
    }
}
