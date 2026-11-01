<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\AOSS;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get ports name for a group.: GET /configuration/v1/aos_switch/ports/groups/{group_name}.
 */
class GetGroupPortsRequest extends ItemRequest
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
        return '/configuration/v1/aos_switch/ports/groups/'.rawurlencode((string) $this->groupName);
    }
}
