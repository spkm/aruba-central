<?php

namespace spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan;

use spkm\ArubaCentral\Classic\Data\VisualRf\CampusListBuilding;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get a specific campus and its buildings: GET /visualrf_api/v1/campus/{campus_id}.
 */
class GetVisualrfApiV1CampusCampusIdRequest extends ItemRequest
{
    protected ?string $dto = CampusListBuilding::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $campusId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/visualrf_api/v1/campus/'.rawurlencode((string) $this->campusId);
    }
}
