<?php

namespace spkm\ArubaCentral\Classic\Data\Troubleshooting;

use spkm\ArubaCentral\Data\Data;

/**
 * A ActionCommand record.
 */
readonly class ActionCommand extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Serial number of device. */
        public ?string $serial = null,
        /** State of action command. Possible values for state are COMPLETED, FAILED. */
        public ?string $state = null,
    ) {}
}
