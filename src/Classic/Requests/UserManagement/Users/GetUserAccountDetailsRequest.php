<?php

namespace spkm\ArubaCentral\Classic\Requests\UserManagement\Users;

use spkm\ArubaCentral\Classic\Data\UserManagement\GetSingleUserAccountPlatform;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get user account details specified by user id: GET /platform/rbac/v1/users/{user_id}.
 *
 * Query options: system_user.
 */
class GetUserAccountDetailsRequest extends ItemRequest
{
    protected ?string $dto = GetSingleUserAccountPlatform::class;

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
