<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete Mobility Master to Mobility Device mapping: DELETE /device_management/v1/mobility_master/{device_serial}.
 */
class DelMdMmMappingRequest extends DeleteRequest
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
        return '/device_management/v1/mobility_master/'.rawurlencode((string) $this->deviceSerial);
    }
}
