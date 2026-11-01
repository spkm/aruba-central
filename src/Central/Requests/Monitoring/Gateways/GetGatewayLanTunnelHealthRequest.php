<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GatewayTunnelHealthSummary;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get summary of gateway LAN tunnels health: GET /network-monitoring/v1/gateways/{serial-number}/lan-tunnels-health-summary.
 */
class GetGatewayLanTunnelHealthRequest extends ItemRequest
{
    protected ?string $dto = GatewayTunnelHealthSummary::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/lan-tunnels-health-summary';
    }
}
