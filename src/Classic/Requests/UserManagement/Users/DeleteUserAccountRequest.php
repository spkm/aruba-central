<?php

namespace spkm\ArubaCentral\Classic\Requests\UserManagement\Users;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete user account details specified by user id: DELETE /platform/rbac/v1/users/{user_id}.
 *
 * Query options: system_user.
 */
class DeleteUserAccountRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $userId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/rbac/v1/users/'.rawurlencode((string) $this->userId);
    }
}
