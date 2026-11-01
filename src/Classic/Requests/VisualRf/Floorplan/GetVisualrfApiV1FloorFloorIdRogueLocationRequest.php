<?php

namespace spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan;

use spkm\ArubaCentral\Classic\Data\VisualRf\FloorListRogueLocation;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get a specific floor and location of all its rogue access points: GET /visualrf_api/v1/floor/{floor_id}/rogue_location.
 *
 * Query options: units.
 */
class GetVisualrfApiV1FloorFloorIdRogueLocationRequest extends ItemRequest
{
    protected ?string $dto = FloorListRogueLocation::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $floorId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/visualrf_api/v1/floor/'.rawurlencode((string) $this->floorId).'/rogue_location';
    }
}
