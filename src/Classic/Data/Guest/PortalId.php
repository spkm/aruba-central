<?php

namespace spkm\ArubaCentral\Classic\Data\Guest;

use spkm\ArubaCentral\Data\Data;

/**
 * A PortalId record.
 */
readonly class PortalId extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Portal ID */
        public ?string $id = null,
    ) {}
}
