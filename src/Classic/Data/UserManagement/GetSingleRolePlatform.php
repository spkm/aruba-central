<?php

namespace spkm\ArubaCentral\Classic\Data\UserManagement;

use spkm\ArubaCentral\Data\Data;

/**
 * A GetSingleRolePlatform record.
 */
readonly class GetSingleRolePlatform extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $applications
     */
    public function __construct(
        public ?string $role = null,
        public ?string $permission = null,
        public ?bool $precanned = null,
        public ?int $no_of_users = null,
        public ?array $applications = null,
    ) {}
}
