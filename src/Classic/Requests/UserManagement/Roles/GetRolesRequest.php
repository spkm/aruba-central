<?php

namespace spkm\ArubaCentral\Classic\Requests\UserManagement\Roles;

use spkm\ArubaCentral\Classic\Data\UserManagement\GetAllRolesPlatform;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get list of all roles: GET /platform/rbac/v1/roles.
 *
 * Query parameters: order_by, app_name.
 */
class GetRolesRequest extends ListRequest
{
    protected ?string $dto = GetAllRolesPlatform::class;

    public string $resultKey = 'items';

    public array $defaults = ['app_name' => 'nms'];

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/rbac/v1/roles';
    }
}
