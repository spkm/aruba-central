<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A HardwareTrends record.
 */
readonly class HardwareTrends extends Data
{
    /**
     * @param  array<mixed>|null  $keys
     * @param  array<mixed>|null  $switchMetrics
     * @param  array<mixed>|null  $units
     */
    public function __construct(
        /** identifier. */
        public ?string $id = null,
        /** Device type of monitoring. */
        public ?string $type = null,
        /** Trends name. */
        public ?string $metric = null,
        /** Trends list. */
        public ?array $keys = null,
        /** Samples for the trends. A list of SwitchMetrics records. */
        public ?array $switchMetrics = null,
        /** Units for the trends in the keys list. */
        public ?array $units = null,
    ) {}
}
