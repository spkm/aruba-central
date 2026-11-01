<?php

namespace spkm\ArubaCentral\Classic\Requests\UserManagement\Users;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Change user password: POST /platform/rbac/v1/users/{user_id}/password.
 *
 * Body: current_password, new_password.
 */
class ChangeUserPasswordRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $userId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/rbac/v1/users/'.rawurlencode((string) $this->userId).'/password';
    }
}
