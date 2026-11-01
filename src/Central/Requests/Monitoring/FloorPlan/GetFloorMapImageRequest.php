<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Retrieve Floor Map Image: GET /network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/image.
 */
class GetFloorMapImageRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $siteId, protected string $floorId, protected string $raster, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/sitemaps/'.rawurlencode((string) $this->siteId).'/floors/'.rawurlencode((string) $this->floorId).'/image';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['raster' => $this->raster, ...parent::defaultQuery()];
    }
}
