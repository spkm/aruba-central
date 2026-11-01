<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\RadioThroughputTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Access Point Radio throughput trend.: GET /network-monitoring/v1/aps/{serial-number}/radios/{radio-number}/throughput-trends.
 *
 * Query options: filter, site-id, site-name.
 */
class GetAccessPointRadioThroughputRequest extends ItemRequest
{
    protected ?string $dto = RadioThroughputTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $radioNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/aps/'.rawurlencode((string) $this->serialNumber).'/radios/'.rawurlencode((string) $this->radioNumber).'/throughput-trends';
    }
}
