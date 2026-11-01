<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A GetDeviceAutoCommitState record.
 */
readonly class GetDeviceAutoCommitState extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $serial = null,
        /** One of: On, Off. */
        public ?string $auto_commit_state = null,
    ) {}
}
