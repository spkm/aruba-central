<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Unarchive devices using Serial list: POST /platform/device_inventory/v1/devices/unarchive.
 *
 * Body: serials.
 */
class UnarchiveDevicesRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/device_inventory/v1/devices/unarchive';
    }
}
