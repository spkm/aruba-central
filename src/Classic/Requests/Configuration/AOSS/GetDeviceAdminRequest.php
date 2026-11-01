<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\AOSS;

use spkm\ArubaCentral\Classic\Data\Configuration\AdminDetails;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get admin SSH details of a device.: GET /configuration/v1/aos_switch/system/devices/{device_serial}.
 */
class GetDeviceAdminRequest extends ItemRequest
{
    protected ?string $dto = AdminDetails::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceSerial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/aos_switch/system/devices/'.rawurlencode((string) $this->deviceSerial);
    }
}
