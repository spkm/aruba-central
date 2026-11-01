<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\VariablesFirewall;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete group from Variables Firewall whitelist.: DELETE /configuration/v1/variables_firewall/groups/{group}.
 */
class DeleteVfwGroupRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $group, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/variables_firewall/groups/'.rawurlencode((string) $this->group);
    }
}
