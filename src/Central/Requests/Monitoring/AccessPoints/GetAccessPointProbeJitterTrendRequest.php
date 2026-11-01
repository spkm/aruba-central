<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\APProbeTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get jitter trend of an Access Point Tunnel.: GET /network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}/jitter-trends.
 *
 * Query options: filter, site-id, site-name.
 */
class GetAccessPointProbeJitterTrendRequest extends ItemRequest
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
        return '/network-monitoring/v1/aps/'.rawurlencode((string) $this->serialNumber).'/tunnels/'.rawurlencode((string) $this->tunnelId).'/jitter-trends';
    }
}
