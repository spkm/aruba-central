<?php

namespace spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan;

use spkm\ArubaCentral\Classic\Data\VisualRf\FloorImage;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get background image of a specific floor: GET /visualrf_api/v1/floor/{floor_id}/image.
 */
class GetVisualrfApiV1FloorFloorIdImageRequest extends ItemRequest
{
    protected ?string $dto = FloorImage::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $floorId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/visualrf_api/v1/floor/'.rawurlencode((string) $this->floorId).'/image';
    }
}
