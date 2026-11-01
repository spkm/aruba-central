<?php

namespace spkm\ArubaCentral\Classic\Requests\UserManagement\Users;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create a user account: POST /platform/rbac/v1/users.
 *
 * Body: username, password, description, name, phone, address, applications.
 */
class CreateUserAccountRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/rbac/v1/users';
    }
}
