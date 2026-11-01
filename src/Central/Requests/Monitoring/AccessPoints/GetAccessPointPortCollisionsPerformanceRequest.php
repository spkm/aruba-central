<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\PortCollisionsTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Access Point Port Collision Errors: GET /network-monitoring/v1/aps/{serial-number}/ports/{port-index}/collisions-trends.
 *
 * Query options: filter, site-id, site-name.
 */
class GetAccessPointPortCollisionsPerformanceRequest extends ItemRequest
{
    protected ?string $dto = PortCollisionsTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $portIndex, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/aps/'.rawurlencode((string) $this->serialNumber).'/ports/'.rawurlencode((string) $this->portIndex).'/collisions-trends';
    }
}
