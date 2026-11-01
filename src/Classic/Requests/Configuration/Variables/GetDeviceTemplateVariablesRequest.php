<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Variables;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get template variables for a device.: GET /configuration/v1/devices/{device_serial}/template_variables.
 */
class GetDeviceTemplateVariablesRequest extends ItemRequest
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
