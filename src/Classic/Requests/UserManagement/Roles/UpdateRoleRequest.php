<?php

namespace spkm\ArubaCentral\Classic\Requests\UserManagement\Roles;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update a role: PATCH /platform/rbac/v1/apps/{app_name}/roles/{rolename}.
 *
 * Body: rolename, permission, applications.
 */
class UpdateRoleRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $appName, protected string $rolename, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/rbac/v1/apps/'.rawurlencode((string) $this->appName).'/roles/'.rawurlencode((string) $this->rolename);
    }
}
