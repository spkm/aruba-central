<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan;

use spkm\ArubaCentral\Central\Data\Monitoring\FloorMap;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Retrieve FloorMap information: GET /network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}.
 */
class GetFloorMapRequest extends ItemRequest
{
    protected ?string $dto = FloorMap::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $siteId, protected string $floorId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/sitemaps/'.rawurlencode((string) $this->siteId).'/floors/'.rawurlencode((string) $this->floorId);
    }
}
