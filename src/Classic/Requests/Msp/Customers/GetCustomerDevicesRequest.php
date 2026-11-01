<?php

namespace spkm\ArubaCentral\Classic\Requests\Msp\Customers;

use spkm\ArubaCentral\Classic\Data\Msp\LicenseAndDevices;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get list of devices and licenses under the Customer account based on limit and offset, offset should be a multiple of the limit value: GET /msp_api/v1/customers/{customer_id}/devices.
 *
 * Query options: device_type.
 */
class GetCustomerDevicesRequest extends ItemRequest
{
    protected ?string $dto = LicenseAndDevices::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $customerId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/msp_api/v1/customers/'.rawurlencode((string) $this->customerId).'/devices';
    }
}
