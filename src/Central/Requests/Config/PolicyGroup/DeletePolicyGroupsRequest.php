<?php

namespace spkm\ArubaCentral\Central\Requests\Config\PolicyGroup;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete policy-groups: DELETE /network-config/v1alpha1/policy-groups.
 *
 * Query options: object-type, scope-id, device-function.
 */
class DeletePolicyGroupsRequest extends DeleteRequest
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
        return '/network-config/v1alpha1/policy-groups';
    }
}
