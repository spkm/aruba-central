<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GwLanTunnelThroughputTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get gateway tunnel throughput trend: GET /network-monitoring/v1/gateways/{serial-number}/tunnels/{tunnel-name}/throughput-trends.
 *
 * Query options: filter, site-id.
 */
class GetGatewayTunnelThroughputTrendRequest extends ItemRequest
{
    protected ?string $dto = GwLanTunnelThroughputTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $tunnelName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/tunnels/'.rawurlencode((string) $this->tunnelName).'/throughput-trends';
    }
}
