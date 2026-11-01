<?php

namespace spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan;

use spkm\ArubaCentral\Classic\Data\VisualRf\FloorListAccessPoint;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get a specific floor and location of all its access points: GET /visualrf_api/v1/floor/{floor_id}/access_point_location.
 *
 * Query options: units.
 */
class GetVisualrfApiV1FloorFloorIdAccessPointLocationRequest extends ItemRequest
{
    protected ?string $dto = FloorListAccessPoint::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $floorId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/visualrf_api/v1/floor/'.rawurlencode((string) $this->floorId).'/access_point_location';
    }
}
