<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A ProfileCount record.
 */
readonly class ProfileCount extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $collectorId = null,
        public ?int $count = null,
    ) {}
}
