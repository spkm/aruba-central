<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Devices;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get templates of devices for given template hash (Only allowed for user having all_groups access or admin).: GET /configuration/v1/devices/{template_hash}/template.
 */
class GetHashTemplateDetailsRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $templateHash, protected string $excludeHash, protected string $deviceType, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/devices/'.rawurlencode((string) $this->templateHash).'/template';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['exclude_hash' => $this->excludeHash, 'device_type' => $this->deviceType, ...parent::defaultQuery()];
    }
}
