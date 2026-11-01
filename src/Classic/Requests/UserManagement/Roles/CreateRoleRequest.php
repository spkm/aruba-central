<?php

namespace spkm\ArubaCentral\Classic\Requests\UserManagement\Roles;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create a role in an app: POST /platform/rbac/v1/apps/{app_name}/roles.
 *
 * Body: rolename, permission, applications.
 */
class CreateRoleRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $appName, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/rbac/v1/apps/'.rawurlencode((string) $this->appName).'/roles';
    }
}
