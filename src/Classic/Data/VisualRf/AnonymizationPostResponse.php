<?php

namespace spkm\ArubaCentral\Classic\Data\VisualRf;

use spkm\ArubaCentral\Data\Data;

/**
 * A AnonymizationPostResponse record.
 */
readonly class AnonymizationPostResponse extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Anonymization status One of: ENABLED, DISABLED. */
        public ?string $status = null,
        /** Anonymization schedule. Default value is NEVER One of: NEVER, DAILY, WEEKLY, MONTHLY. */
        public ?string $schedule = null,
    ) {}
}
