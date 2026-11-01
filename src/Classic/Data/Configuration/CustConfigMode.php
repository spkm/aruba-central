<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A CustConfigMode record.
 */
readonly class CustConfigMode extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** One of: Monitor, Manage. */
        public ?string $config_mode = null,
    ) {}
}
