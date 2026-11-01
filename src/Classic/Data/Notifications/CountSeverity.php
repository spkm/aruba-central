<?php

namespace spkm\ArubaCentral\Classic\Data\Notifications;

use spkm\ArubaCentral\Data\Data;

/**
 * A CountSeverity record.
 */
readonly class CountSeverity extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Number of notifications to the corresponding severity */
        public ?int $count = null,
        /** Severity of the alert */
        public ?string $severity = null,
    ) {}
}
