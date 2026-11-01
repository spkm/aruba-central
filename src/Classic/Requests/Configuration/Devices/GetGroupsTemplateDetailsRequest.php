<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Devices;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get templates of devices present in the given list of groups.: GET /configuration/v1/devices/groups/template.
 *
 * Query options: include_groups, exclude_groups, all_groups.
 */
class GetGroupsTemplateDetailsRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceType, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/devices/groups/template';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['device_type' => $this->deviceType, ...parent::defaultQuery()];
    }
}
