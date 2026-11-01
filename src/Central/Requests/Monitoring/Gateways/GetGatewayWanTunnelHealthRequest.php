<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GatewayWanTunnelHealthSummary;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get summary of gateway WAN tunnel health: GET /network-monitoring/v1/gateways/{serial-number}/wan-tunnels-health-summary.
 */
class GetGatewayWanTunnelHealthRequest extends ItemRequest
{
    protected ?string $dto = GatewayWanTunnelHealthSummary::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/wan-tunnels-health-summary';
    }
}
