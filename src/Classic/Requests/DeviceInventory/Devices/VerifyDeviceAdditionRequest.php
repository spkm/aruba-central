<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\DeviceInventory\InlineResponse200;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Verify device addition: POST /platform/device_inventory/v1/devices/verify.
 */
class VerifyDeviceAdditionRequest extends WriteRequest
{
    protected ?string $dto = InlineResponse200::class;

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
        return '/platform/device_inventory/v1/devices/verify';
    }
}
