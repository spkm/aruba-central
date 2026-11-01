<?php

namespace spkm\ArubaCentral\Classic\Requests\UserManagement\Users;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update user account details specified by user id. Providing info on account setting app is mandatory in this API along with other subscribed apps. Scope must…: PATCH /platform/rbac/v1/users/{user_id}.
 *
 * Body: username, description, name, phone, address, applications.
 */
class UpdateUserAccountRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

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
        return '/platform/rbac/v1/users/'.rawurlencode((string) $this->userId);
    }
}
