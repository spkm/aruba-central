<?php

namespace spkm\ArubaCentral\Classic\Requests\Topology\Topology;

use spkm\ArubaCentral\Classic\Data\Topology\DeviceDetails;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get details of a device.: GET /topology_external_api/devices/{device_serial}.
 */
class DisplayTopologyDevicesRequest extends ItemRequest
{
    protected ?string $dto = DeviceDetails::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceSerial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/topology_external_api/devices/'.rawurlencode((string) $this->deviceSerial);
    }
}
