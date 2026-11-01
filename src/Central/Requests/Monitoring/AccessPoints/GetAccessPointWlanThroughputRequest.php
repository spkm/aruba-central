<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointWLANThroughputTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get the throughput trend for a WLAN of an Access Point.: GET /network-monitoring/v1/aps/{serial-number}/wlans/{wlan-name}/throughput-trends.
 *
 * Query options: filter, site-id, site-name.
 */
class GetAccessPointWlanThroughputRequest extends ItemRequest
{
    protected ?string $dto = AccessPointWLANThroughputTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $wlanName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/aps/'.rawurlencode((string) $this->serialNumber).'/wlans/'.rawurlencode((string) $this->wlanName).'/throughput-trends';
    }
}
