<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * assign the device to the end-customer: PUT /platform/device_inventory/v1/msp/{customer_id}/devices.
 *
 * Body: devices.
 */
class AssignDeviceToCustomerRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $customerId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/device_inventory/v1/msp/'.rawurlencode((string) $this->customerId).'/devices';
    }
}
