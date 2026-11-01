<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\AOSS;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get vlans with tagged, untagged and isolated ports for a group.: GET /configuration/v1/aos_switch/vlans/groups/{group_name}.
 */
class GetGroupVlansRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/aos_switch/vlans/groups/'.rawurlencode((string) $this->groupName);
    }
}
