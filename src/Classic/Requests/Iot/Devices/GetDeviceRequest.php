<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\Devices;

use spkm\ArubaCentral\Classic\Data\Iot\Device;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Return a device by Id: GET /v1/devices/{deviceId}.
 */
class GetDeviceRequest extends ItemRequest
{
    protected ?string $dto = Device::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/devices/'.rawurlencode((string) $this->deviceId);
    }
}
