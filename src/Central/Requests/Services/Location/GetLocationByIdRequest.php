<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Location;

use spkm\ArubaCentral\Central\Data\Services\DeviceLocationSummary;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get location resource: GET /network-services/v1/sites/{site-id}/device-locations/{location-id}.
 */
class GetLocationByIdRequest extends ItemRequest
{
    protected ?string $dto = DeviceLocationSummary::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $siteId, protected string $locationId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/sites/'.rawurlencode((string) $this->siteId).'/device-locations/'.rawurlencode((string) $this->locationId);
    }
}
