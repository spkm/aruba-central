<?php

namespace spkm\ArubaCentral\Classic\Resources\UserManagement;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\UserManagement\GetAllRolesPlatform;
use spkm\ArubaCentral\Classic\Data\UserManagement\GetSingleRolePlatform;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Roles\CreateRoleRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Roles\DeleteRoleRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Roles\GetRoleRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Roles\GetRolesRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Roles\UpdateRoleRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Roles API, from Aruba::userManagement()->roles().
 *
 * @extends Builder<GetAllRolesPlatform>
 */
class RolesResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, GetAllRolesPlatform::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetRolesRequest($query);
    }

    /**
     * Create a role in an app: POST /platform/rbac/v1/apps/{app_name}/roles.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createRole(string $appName, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CreateRoleRequest($appName, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a role: DELETE /platform/rbac/v1/apps/{app_name}/roles/{rolename}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteRole(string $appName, string $rolename, array $options = []): mixed
    {
        return $this->fetch(new DeleteRoleRequest($appName, $rolename, $options));
    }

    /**
     * Get Role details: GET /platform/rbac/v1/apps/{app_name}/roles/{rolename}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getRole(string $appName, string $rolename, array $options = []): ?GetSingleRolePlatform
    {
        return $this->fetch(new GetRoleRequest($appName, $rolename, $options));
    }

    /**
     * Update a role: PATCH /platform/rbac/v1/apps/{app_name}/roles/{rolename}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateRole(string $appName, string $rolename, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateRoleRequest($appName, $rolename, $this->payloadOf($attributes), $options));
    }
}
