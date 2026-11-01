<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices;

use spkm\ArubaCentral\Classic\Data\DeviceInventory\LicenseAndDevicesItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * A filterable paginated response of a list of devices and licenses under the MSP account based on the provided limit and offset parameters.: GET /platform/device_inventory/v1/msp/devices.
 *
 * Query parameters: device_type, customer_name, device_allocation_status.
 */
class GetMspDevicesRequest extends ListRequest
{
    protected ?string $dto = LicenseAndDevicesItem::class;

    public string $resultKey = 'devices';

    public ?string $totalKey = null;

    public ?int $maxLimit = 50;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/device_inventory/v1/msp/devices';
    }
}
