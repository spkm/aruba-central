<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\WLANThroughputTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get the throughput trend for a WLAN.: GET /network-monitoring/v1/wlans/{wlan-name}/throughput-trends.
 *
 * Query options: filter, site-id, site-name.
 */
class GetWlanThroughputTrendRequest extends ItemRequest
{
    protected ?string $dto = WLANThroughputTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $wlanName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/wlans/'.rawurlencode((string) $this->wlanName).'/throughput-trends';
    }
}
