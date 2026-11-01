<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A GroupConfigMode record.
 */
readonly class GroupConfigMode extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $group = null,
        /** One of: Monitor, Manage. */
        public ?string $config_mode = null,
    ) {}
}
