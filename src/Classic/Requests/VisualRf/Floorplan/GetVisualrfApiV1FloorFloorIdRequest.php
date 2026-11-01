<?php

namespace spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan;

use spkm\ArubaCentral\Classic\Data\VisualRf\FloorObj;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get details of a specific floor: GET /visualrf_api/v1/floor/{floor_id}.
 *
 * Query options: units.
 */
class GetVisualrfApiV1FloorFloorIdRequest extends ItemRequest
{
    protected ?string $dto = FloorObj::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $floorId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/visualrf_api/v1/floor/'.rawurlencode((string) $this->floorId);
    }
}
