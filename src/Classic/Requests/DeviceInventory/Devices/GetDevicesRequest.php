<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices;

use spkm\ArubaCentral\Classic\Data\DeviceInventory\DevicesResponseItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get devices from device inventory: GET /platform/device_inventory/v1/devices.
 *
 * Query parameters (* required): sku_type*.
 */
class GetDevicesRequest extends ListRequest
{
    protected ?string $dto = DevicesResponseItem::class;

    public string $resultKey = 'devices';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/device_inventory/v1/devices';
    }
}
