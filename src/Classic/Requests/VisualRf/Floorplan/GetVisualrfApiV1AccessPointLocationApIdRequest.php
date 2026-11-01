<?php

namespace spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan;

use spkm\ArubaCentral\Classic\Data\VisualRf\AccessPointObj;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get location of a specific access point: GET /visualrf_api/v1/access_point_location/{ap_id}.
 *
 * Query options: units.
 */
class GetVisualrfApiV1AccessPointLocationApIdRequest extends ItemRequest
{
    protected ?string $dto = AccessPointObj::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $apId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/visualrf_api/v1/access_point_location/'.rawurlencode((string) $this->apId);
    }
}
