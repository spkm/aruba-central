<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Devices;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get templates for a list of devices.: GET /configuration/v1/devices/template.
 */
class GetDevicesTemplateDetailsRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceSerials, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/devices/template';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['device_serials' => $this->deviceSerials, ...parent::defaultQuery()];
    }
}
