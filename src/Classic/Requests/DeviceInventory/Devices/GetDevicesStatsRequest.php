<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices;

use spkm\ArubaCentral\Classic\Data\DeviceInventory\DevicesStatsData;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get devices stats: GET /platform/device_inventory/v1/devices/stats.
 */
class GetDevicesStatsRequest extends ItemRequest
{
    protected ?string $dto = DevicesStatsData::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $skuType, protected string $serviceType, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/device_inventory/v1/devices/stats';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['sku_type' => $this->skuType, 'service_type' => $this->serviceType, ...parent::defaultQuery()];
    }
}
