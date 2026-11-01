<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices;

use spkm\ArubaCentral\Classic\Data\DeviceInventory\DeviceData;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get device from device inventory: GET /platform/device_inventory/v1/device/{serial}.
 */
class GetDeviceRequest extends ItemRequest
{
    protected ?string $dto = DeviceData::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/device_inventory/v1/device/'.rawurlencode((string) $this->serial);
    }
}
