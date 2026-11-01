<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Variables;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete all of the template variables for a device.: DELETE /configuration/v1/devices/{device_serial}/template_variables.
 */
class DeleteDeviceTemplateVariablesRequest extends DeleteRequest
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
        return '/configuration/v1/devices/'.rawurlencode((string) $this->deviceSerial).'/template_variables';
    }
}
