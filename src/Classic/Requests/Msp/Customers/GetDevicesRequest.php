<?php

namespace spkm\ArubaCentral\Classic\Requests\Msp\Customers;

use spkm\ArubaCentral\Classic\Data\Msp\LicenseAndDevices;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get list of devices and licenses under the MSP account based on limit and offset, offset should be a multiple of the limit value: GET /msp_api/v1/devices.
 *
 * Query options: device_allocation_status, device_type, customer_name.
 */
class GetDevicesRequest extends ItemRequest
{
    protected ?string $dto = LicenseAndDevices::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/msp_api/v1/devices';
    }
}
