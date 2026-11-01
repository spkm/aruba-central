<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GwLanTunnelStatusTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get gateway tunnel status trend: GET /network-monitoring/v1/gateways/{serial-number}/tunnels/{tunnel-name}/status-trends.
 *
 * Query options: filter, site-id.
 */
class GetGatewayTunnelStatusTrendRequest extends ItemRequest
{
    protected ?string $dto = GwLanTunnelStatusTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $tunnelName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/tunnels/'.rawurlencode((string) $this->tunnelName).'/status-trends';
    }
}
