<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A RFSummary record.
 */
readonly class RFSummary extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Sample timestamp in epoch */
        public ?float $timestamp = null,
        /** Noise floor for the timestamp */
        public ?int $noise_floor = null,
        /** Utilization for the timestamp */
        public ?int $utilization = null,
    ) {}
}
