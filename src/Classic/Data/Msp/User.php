<?php

namespace spkm\ArubaCentral\Classic\Data\Msp;

use spkm\ArubaCentral\Data\Data;

/**
 * A User record.
 */
readonly class User extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $groups
     */
    public function __construct(
        /** Whether this user is the current user of the system */
        public ?bool $current_user = null,
        /** Group information */
        public ?array $groups = null,
        /** Role of the user readonly readwrite guestoperator admin One of: admin, readwrite, readonly, guestoperator. */
        public ?string $role = null,
        /** Description */
        public ?string $description = null,
        /** Username */
        public ?string $username = null,
    ) {}
}
