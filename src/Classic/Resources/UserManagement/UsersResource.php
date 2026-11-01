<?php

namespace spkm\ArubaCentral\Classic\Resources\UserManagement;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\UserManagement\GetAllUserAccountsPlatform;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Users\ChangeUserPasswordRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Users\CreateUserAccountRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Users\DeleteUserAccountRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Users\GetUserAccountDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Users\GetUserAccountsRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Users\ResetUserPasswordRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Users\UpdateUserAccountRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Users API, from Aruba::userManagement()->users().
 *
 * @extends Builder<GetAllUserAccountsPlatform>
 */
class UsersResource extends Builder
{
    protected string $idField = 'userId';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, GetAllUserAccountsPlatform::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetUserAccountsRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetUserAccountDetailsRequest((string) $id);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new CreateUserAccountRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new UpdateUserAccountRequest((string) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteUserAccountRequest((string) $id, $options);
    }

    /**
     * Change user password: POST /platform/rbac/v1/users/{user_id}/password.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function changePassword(string $userId, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new ChangeUserPasswordRequest($userId, $this->payloadOf($attributes), $options));
    }

    /**
     * Reset user password: POST /platform/rbac/v1/users/{user_id}/password/reset.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function resetPassword(string $userId, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new ResetUserPasswordRequest($userId, $this->payloadOf($attributes), $options));
    }
}
