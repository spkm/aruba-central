<?php

namespace spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan;

use spkm\ArubaCentral\Classic\Data\VisualRf\GeofenceRepsonseEnabled;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get status of geofence: GET /visualrf_api/v1/geofence.
 */
class GetVisualrfApiV1GeofenceRequest extends ItemRequest
{
    protected ?string $dto = GeofenceRepsonseEnabled::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/visualrf_api/v1/geofence';
    }
}
