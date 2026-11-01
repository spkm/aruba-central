<?php

namespace spkm\ArubaCentral\Classic\Data\DeviceInventory;

use spkm\ArubaCentral\Data\Data;

/**
 * A DevicesStatsData record.
 */
readonly class DevicesStatsData extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?int $licensed = null,
        public ?int $total = null,
    ) {}
}
