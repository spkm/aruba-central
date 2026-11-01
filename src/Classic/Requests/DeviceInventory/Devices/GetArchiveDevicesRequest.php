<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices;

use spkm\ArubaCentral\Classic\Data\DeviceInventory\ArchiveDeviceListModel;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get Archived devices from device inventory: GET /platform/device_inventory/v1/devices/archive.
 */
class GetArchiveDevicesRequest extends ListRequest
{
    protected ?string $dto = ArchiveDeviceListModel::class;

    public string $resultKey = 'devices';

    public ?string $totalKey = null;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/device_inventory/v1/devices/archive';
    }
}
