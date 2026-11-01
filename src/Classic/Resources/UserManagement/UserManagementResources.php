<?php

namespace spkm\ArubaCentral\Classic\Resources\UserManagement;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The User management APIs, from Aruba::userManagement().
 *
 * @extends BaseResource<Data>
 */
class UserManagementResources extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * The Bulk Users API.
     */
    public function bulkUsers(): BulkUsersResource
    {
        return new BulkUsersResource($this->connector);
    }

    /**
     * The Roles API.
     */
    public function roles(): RolesResource
    {
        return new RolesResource($this->connector);
    }

    /**
     * The Users API.
     */
    public function users(): UsersResource
    {
        return new UsersResource($this->connector);
    }
}
