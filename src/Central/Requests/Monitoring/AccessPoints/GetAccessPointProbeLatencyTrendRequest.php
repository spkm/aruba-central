<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\APProbeTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get latency trend of an Access Point Tunnel.: GET /network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}/latency-trends.
 *
 * Query options: filter, site-id, site-name.
 */
class GetAccessPointProbeLatencyTrendRequest extends ItemRequest
{
    protected ?string $dto = APProbeTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $tunnelId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/aps/'.rawurlencode((string) $this->serialNumber).'/tunnels/'.rawurlencode((string) $this->tunnelId).'/latency-trends';
    }
}
