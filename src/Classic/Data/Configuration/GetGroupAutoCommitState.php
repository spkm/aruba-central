<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A GetGroupAutoCommitState record.
 */
readonly class GetGroupAutoCommitState extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $group = null,
        /** One of: On, Off. */
        public ?string $auto_commit_state = null,
    ) {}
}
