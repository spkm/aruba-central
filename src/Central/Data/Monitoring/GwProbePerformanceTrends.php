<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GwProbePerformanceTrends record.
 */
readonly class GwProbePerformanceTrends extends Data
{
    /**
     * @param  array<mixed>|null  $graph
     */
    public function __construct(
        /** Metric for the uplink performance trend. */
        public ?string $metric = null,
        /** Keys: keys, samples. */
        public ?array $graph = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
