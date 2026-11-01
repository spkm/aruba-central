<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A AppInstalledCount record.
 */
readonly class AppInstalledCount extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $collectorId = null,
        public ?int $total = null,
        public ?int $updated = null,
        public ?int $upgradable = null,
    ) {}
}
