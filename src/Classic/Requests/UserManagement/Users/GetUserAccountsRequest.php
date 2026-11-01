<?php

namespace spkm\ArubaCentral\Classic\Requests\UserManagement\Users;

use spkm\ArubaCentral\Classic\Data\UserManagement\GetAllUserAccountsPlatform;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List user accounts: GET /platform/rbac/v1/users.
 *
 * Query parameters: order_by, app_name, type, status.
 */
class GetUserAccountsRequest extends ListRequest
{
    protected ?string $dto = GetAllUserAccountsPlatform::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/rbac/v1/users';
    }
}
