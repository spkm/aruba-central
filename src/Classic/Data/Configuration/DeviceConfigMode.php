<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A DeviceConfigMode record.
 */
readonly class DeviceConfigMode extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $serial = null,
        /** One of: Monitor, Manage. */
        public ?string $config_mode = null,
    ) {}
}
