<?php

namespace spkm\ArubaCentral\Classic\Data\UserManagement;

use spkm\ArubaCentral\Data\Data;

/**
 * A BulkUser record.
 */
readonly class BulkUser extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Cookie to find the status of the bulk operation */
        public ?string $cookie = null,
    ) {}
}
