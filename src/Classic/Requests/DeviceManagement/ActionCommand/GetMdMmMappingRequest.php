<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand;

use spkm\ArubaCentral\Classic\Data\DeviceManagement\MobilityDeviceMMInfo;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get assigned Mobility Master to Mobility Device.: GET /device_management/v1/mobility_master/{device_serial}.
 */
class GetMdMmMappingRequest extends ItemRequest
{
    protected ?string $dto = MobilityDeviceMMInfo::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceSerial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/device_management/v1/mobility_master/'.rawurlencode((string) $this->deviceSerial);
    }
}
