<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\RFNoiseFloorTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get noise floor information for a radio: GET /network-monitoring/v1/aps/{serial-number}/radios/{radio-number}/noise-floor-trends.
 *
 * Query options: filter, site-id, site-name.
 */
class GetAPRFNoiseFloorPerformanceRequest extends ItemRequest
{
    protected ?string $dto = RFNoiseFloorTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $radioNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/aps/'.rawurlencode((string) $this->serialNumber).'/radios/'.rawurlencode((string) $this->radioNumber).'/noise-floor-trends';
    }
}
