<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Location;

use spkm\ArubaCentral\Central\Data\Services\DeviceLocationSummary;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get device location details: GET /network-services/v1/sites/{site-id}/devices/{serial-number}/location.
 */
class GetDeviceDetailedLocationRequest extends ItemRequest
{
    protected ?string $dto = DeviceLocationSummary::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $siteId, protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/sites/'.rawurlencode((string) $this->siteId).'/devices/'.rawurlencode((string) $this->serialNumber).'/location';
    }
}
