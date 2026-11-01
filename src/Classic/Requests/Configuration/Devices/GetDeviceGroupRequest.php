<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Devices;

use spkm\ArubaCentral\Classic\Data\Configuration\Group;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get group for a device.: GET /configuration/v1/devices/{device_serial}/group.
 */
class GetDeviceGroupRequest extends ItemRequest
{
    protected ?string $dto = Group::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceSerial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/devices/'.rawurlencode((string) $this->deviceSerial).'/group';
    }
}
