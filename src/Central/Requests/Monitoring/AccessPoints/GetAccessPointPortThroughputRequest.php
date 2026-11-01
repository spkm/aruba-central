<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\PortThroughputTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Access Point Port throughput trend.: GET /network-monitoring/v1/aps/{serial-number}/ports/{port-index}/throughput-trends.
 *
 * Query options: filter, site-id, site-name.
 */
class GetAccessPointPortThroughputRequest extends ItemRequest
{
    protected ?string $dto = PortThroughputTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $portIndex, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/aps/'.rawurlencode((string) $this->serialNumber).'/ports/'.rawurlencode((string) $this->portIndex).'/throughput-trends';
    }
}
