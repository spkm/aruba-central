<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A Sampling record.
 */
readonly class Sampling extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $aplist
     */
    public function __construct(
        /** Sampling ID */
        public ?int $sampling_id = null,
        /** AP List */
        public ?array $aplist = null,
    ) {}
}
