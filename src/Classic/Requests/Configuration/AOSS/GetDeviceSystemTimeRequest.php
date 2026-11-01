<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\AOSS;

use spkm\ArubaCentral\Classic\Data\Configuration\DeviceSystemTime;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get system time details for a device.: GET /configuration/v1/aos_switch/system_time/devices/{device_serial}.
 */
class GetDeviceSystemTimeRequest extends ItemRequest
{
    protected ?string $dto = DeviceSystemTime::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceSerial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/aos_switch/system_time/devices/'.rawurlencode((string) $this->deviceSerial);
    }
}
