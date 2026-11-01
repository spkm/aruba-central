<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Devices;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get configuration details for a device (only for template groups).: GET /configuration/v1/devices/{device_serial}/config_details.
 *
 * Query options: details.
 */
class GetDeviceConfigurationDetailsRequest extends ItemRequest
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
        return '/configuration/v1/devices/'.rawurlencode((string) $this->deviceSerial).'/config_details';
    }
}
