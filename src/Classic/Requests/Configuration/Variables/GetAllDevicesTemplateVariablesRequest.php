<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Variables;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get template variables for all devices, Response is sorted by device serial.: GET /configuration/v1/devices/template_variables.
 *
 * Query options: format.
 */
class GetAllDevicesTemplateVariablesRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/devices/template_variables';
    }
}
