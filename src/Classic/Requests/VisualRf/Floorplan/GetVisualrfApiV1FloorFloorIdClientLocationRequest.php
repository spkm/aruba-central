<?php

namespace spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan;

use spkm\ArubaCentral\Classic\Data\VisualRf\FloorListClientLocation;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get a specific floor and location of all its clients: GET /visualrf_api/v1/floor/{floor_id}/client_location.
 *
 * Query options: units.
 */
class GetVisualrfApiV1FloorFloorIdClientLocationRequest extends ItemRequest
{
    protected ?string $dto = FloorListClientLocation::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $floorId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/visualrf_api/v1/floor/'.rawurlencode((string) $this->floorId).'/client_location';
    }
}
