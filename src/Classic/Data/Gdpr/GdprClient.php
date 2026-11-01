<?php

namespace spkm\ArubaCentral\Classic\Data\Gdpr;

use spkm\ArubaCentral\Data\Data;

/**
 * A GdprClient record.
 */
readonly class GdprClient extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** MAC Address of the optout client */
        public ?string $mac = null,
        /** Timestamp */
        public ?string $ts = null,
    ) {}
}
