<?php

namespace spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\VisualRf\GeofenceRepsonseEnabled;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Enable geofence: POST /visualrf_api/v1/geofence.
 */
class PostVisualrfApiV1GeofenceRequest extends ActionRequest
{
    protected ?string $dto = GeofenceRepsonseEnabled::class;

    protected Method $method = Method::POST;

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
