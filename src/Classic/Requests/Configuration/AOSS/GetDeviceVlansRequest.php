<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\AOSS;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get vlans with tagged, untagged and isolated ports for a device.: GET /configuration/v1/aos_switch/vlans/devices/{device_serial}.
 */
class GetDeviceVlansRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceSerial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/aos_switch/vlans/devices/'.rawurlencode((string) $this->deviceSerial);
    }
}
