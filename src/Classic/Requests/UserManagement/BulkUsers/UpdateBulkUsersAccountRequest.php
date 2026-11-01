<?php

namespace spkm\ArubaCentral\Classic\Requests\UserManagement\BulkUsers;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\UserManagement\BulkUser;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update multiple users account. The max no of accounts that can be updated at once is 10.Providing role on account setting app is mandatory in this API along…: PATCH /platform/rbac/v1/bulk_users.
 *
 * Body: BulkUserUpdatePlatform.
 */
class UpdateBulkUsersAccountRequest extends WriteRequest
{
    protected ?string $dto = BulkUser::class;

    protected Method $method = Method::PATCH;

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
        return '/platform/rbac/v1/bulk_users';
    }
}
