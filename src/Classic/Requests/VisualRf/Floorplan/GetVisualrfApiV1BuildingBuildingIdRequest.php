<?php

namespace spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan;

use spkm\ArubaCentral\Classic\Data\VisualRf\BuildingListFloor;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get a specific building and its floors: GET /visualrf_api/v1/building/{building_id}.
 *
 * Query options: units.
 */
class GetVisualrfApiV1BuildingBuildingIdRequest extends ItemRequest
{
    protected ?string $dto = BuildingListFloor::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $buildingId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/visualrf_api/v1/building/'.rawurlencode((string) $this->buildingId);
    }
}
