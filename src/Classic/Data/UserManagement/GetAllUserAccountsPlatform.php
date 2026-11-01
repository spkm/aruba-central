<?php

namespace spkm\ArubaCentral\Classic\Data\UserManagement;

use spkm\ArubaCentral\Data\Data;

/**
 * A GetAllUserAccountsPlatform record.
 */
readonly class GetAllUserAccountsPlatform extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $name
     * @param  array<mixed>|null  $applications
     */
    public function __construct(
        /** name of user */
        public ?string $username = null,
        /** whether this user is system or federated user */
        public ?bool $system_user = null,
        public ?array $name = null,
        /** rbac info of user */
        public ?array $applications = null,
    ) {}
}
