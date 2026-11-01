<?php

namespace spkm\ArubaCentral\Classic\Data\Guest;

use spkm\ArubaCentral\Data\Data;

/**
 * A VisitorId record.
 */
readonly class VisitorId extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $id
     */
    public function __construct(
        /** Visitor ID */
        public ?array $id = null,
    ) {}
}
