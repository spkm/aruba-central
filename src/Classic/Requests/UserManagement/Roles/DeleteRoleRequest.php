<?php

namespace spkm\ArubaCentral\Classic\Requests\UserManagement\Roles;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete a role: DELETE /platform/rbac/v1/apps/{app_name}/roles/{rolename}.
 */
class DeleteRoleRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $appName, protected string $rolename, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/rbac/v1/apps/'.rawurlencode((string) $this->appName).'/roles/'.rawurlencode((string) $this->rolename);
    }
}
