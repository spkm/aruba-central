<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\TunnelThroughputTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get throughput trend of an Access Point Tunnel.: GET /network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}/throughput-trends.
 *
 * Query options: filter, site-id, site-name.
 */
class GetAccessPointTunnelThroughputRequest extends ItemRequest
{
    protected ?string $dto = TunnelThroughputTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $tunnelId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/aps/'.rawurlencode((string) $this->serialNumber).'/tunnels/'.rawurlencode((string) $this->tunnelId).'/throughput-trends';
    }
}
