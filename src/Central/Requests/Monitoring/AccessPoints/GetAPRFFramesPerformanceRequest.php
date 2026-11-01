<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\RFFramesTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get transmission information for a radio: GET /network-monitoring/v1/aps/{serial-number}/radios/{radio-number}/frames-trends.
 *
 * Query options: filter, site-id, site-name.
 */
class GetAPRFFramesPerformanceRequest extends ItemRequest
{
    protected ?string $dto = RFFramesTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $radioNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/aps/'.rawurlencode((string) $this->serialNumber).'/radios/'.rawurlencode((string) $this->radioNumber).'/frames-trends';
    }
}
