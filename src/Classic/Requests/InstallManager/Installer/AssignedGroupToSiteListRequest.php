<?php

namespace spkm\ArubaCentral\Classic\Requests\InstallManager\Installer;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get all assigned group to sites list: GET /v1/assigned_group_to_site_list.
 */
class AssignedGroupToSiteListRequest extends ItemRequest
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
        return '/v1/assigned_group_to_site_list';
    }
}
