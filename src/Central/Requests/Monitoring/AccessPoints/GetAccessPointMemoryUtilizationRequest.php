<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointMemoryUtilization;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get memory utilization information for an Access Point: GET /network-monitoring/v1/aps/{serial-number}/memory-utilization-trends.
 *
 * Query options: filter, site-id, site-name.
 */
class GetAccessPointMemoryUtilizationRequest extends ItemRequest
{
    protected ?string $dto = AccessPointMemoryUtilization::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/aps/'.rawurlencode((string) $this->serialNumber).'/memory-utilization-trends';
    }
}
