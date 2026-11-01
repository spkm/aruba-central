<?php

namespace spkm\ArubaCentral\Classic\Data\UserManagement;

use spkm\ArubaCentral\Data\Data;

/**
 * A BulkUserCookie record.
 */
readonly class BulkUserCookie extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $success
     * @param  array<mixed>|null  $failure
     */
    public function __construct(
        /** Get the state of the Bulk operation */
        public ?string $state = null,
        /** Successful user list. */
        public ?array $success = null,
        public ?array $failure = null,
    ) {}
}
