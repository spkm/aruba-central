<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\RFChannelUtilizationTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get channel utilization information for a radio: GET /network-monitoring/v1/aps/{serial-number}/radios/{radio-number}/channel-utilization-trends.
 *
 * Query options: filter, site-id, site-name.
 */
class GetAPRFChannelUtilizationPerformanceRequest extends ItemRequest
{
    protected ?string $dto = RFChannelUtilizationTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $radioNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/aps/'.rawurlencode((string) $this->serialNumber).'/radios/'.rawurlencode((string) $this->radioNumber).'/channel-utilization-trends';
    }
}
