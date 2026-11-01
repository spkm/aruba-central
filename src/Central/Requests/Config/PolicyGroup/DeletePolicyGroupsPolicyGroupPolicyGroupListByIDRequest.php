<?php

namespace spkm\ArubaCentral\Central\Requests\Config\PolicyGroup;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete policy-group-list by name: DELETE /network-config/v1alpha1/policy-groups/policy-group/policy-group-list/{name}.
 *
 * Query options: object-type, scope-id, device-function.
 */
class DeletePolicyGroupsPolicyGroupPolicyGroupListByIDRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/policy-groups/policy-group/policy-group-list/'.rawurlencode((string) $this->name);
    }
}
