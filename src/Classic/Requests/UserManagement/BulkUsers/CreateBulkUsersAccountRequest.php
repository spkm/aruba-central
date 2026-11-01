<?php

namespace spkm\ArubaCentral\Classic\Requests\UserManagement\BulkUsers;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\UserManagement\BulkUser;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create multiple users account. The max no of accounts that can be created at once is 10.: POST /platform/rbac/v1/bulk_users.
 *
 * Body: BulkUserCreatePlatform.
 */
class CreateBulkUsersAccountRequest extends WriteRequest
{
    protected ?string $dto = BulkUser::class;

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
        return '/platform/rbac/v1/bulk_users';
    }
}
