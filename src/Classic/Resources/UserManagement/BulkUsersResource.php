<?php

namespace spkm\ArubaCentral\Classic\Resources\UserManagement;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\UserManagement\BulkUser;
use spkm\ArubaCentral\Classic\Data\UserManagement\BulkUserCookie;
use spkm\ArubaCentral\Classic\Requests\UserManagement\BulkUsers\BulkUsersGetCookieStatusRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\BulkUsers\CreateBulkUsersAccountRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\BulkUsers\DeleteBulkUsersAccountRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\BulkUsers\UpdateBulkUsersAccountRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Bulk Users API, from Aruba::userManagement()->bulkUsers().
 *
 * @extends BaseResource<Data>
 */
class BulkUsersResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get task status: GET /platform/rbac/v1/status/{cookie_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function status(string $cookieName, array $options = []): ?BulkUserCookie
    {
        return $this->fetch(new BulkUsersGetCookieStatusRequest($cookieName, $options));
    }

    /**
     * Create multiple users account. The max no of accounts that can be created at once is 10.: POST /platform/rbac/v1/bulk_users.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createBulkUsersAccount(array|Data $attributes = [], array $options = []): ?BulkUser
    {
        return $this->fetch(new CreateBulkUsersAccountRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Delete multiple users account. The max no of accounts that can be deleted at once is 10.: DELETE /platform/rbac/v1/bulk_users.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deleteBulkUsersAccount(array|Data $attributes = [], array $options = []): ?BulkUser
    {
        return $this->fetch(new DeleteBulkUsersAccountRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Update multiple users account. The max no of accounts that can be updated at once is 10.Providing role on account setting app is mandatory in this…: PATCH /platform/rbac/v1/bulk_users.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateBulkUsersAccount(array|Data $attributes = [], array $options = []): ?BulkUser
    {
        return $this->fetch(new UpdateBulkUsersAccountRequest($this->payloadOf($attributes), $options));
    }
}
