<?php

namespace spkm\ArubaCentral\Classic\Requests\UserManagement\BulkUsers;

use spkm\ArubaCentral\Classic\Data\UserManagement\BulkUserCookie;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get task status: GET /platform/rbac/v1/status/{cookie_name}.
 */
class BulkUsersGetCookieStatusRequest extends ItemRequest
{
    protected ?string $dto = BulkUserCookie::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $cookieName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/rbac/v1/status/'.rawurlencode((string) $this->cookieName);
    }
}
