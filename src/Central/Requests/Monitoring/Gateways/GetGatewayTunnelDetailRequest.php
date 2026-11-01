<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GatewayTunnelDetail;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Gateway tunnel detail: GET /network-monitoring/v1/gateways/{serial-number}/tunnels/{tunnel-name}.
 *
 * Query options: start-at, end-at.
 */
class GetGatewayTunnelDetailRequest extends ItemRequest
{
    protected ?string $dto = GatewayTunnelDetail::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $tunnelName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/tunnels/'.rawurlencode((string) $this->tunnelName);
    }
}
