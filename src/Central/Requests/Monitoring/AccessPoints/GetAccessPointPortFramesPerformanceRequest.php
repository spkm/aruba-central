<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\PortFramesTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Access Point Port Frame Trends: GET /network-monitoring/v1/aps/{serial-number}/ports/{port-index}/frames-trends.
 *
 * Query options: filter, site-id, site-name.
 */
class GetAccessPointPortFramesPerformanceRequest extends ItemRequest
{
    protected ?string $dto = PortFramesTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $portIndex, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/aps/'.rawurlencode((string) $this->serialNumber).'/ports/'.rawurlencode((string) $this->portIndex).'/frames-trends';
    }
}
