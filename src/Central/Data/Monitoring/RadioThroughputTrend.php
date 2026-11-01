<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A RadioThroughputTrend record.
 */
readonly class RadioThroughputTrend extends Data
{
    /**
     * @param  array<mixed>|null  $graph
     */
    public function __construct(
        /** Metric for the throughput trend of an access point radio. */
        public ?string $metric = null,
        /** Keys: keys, samples, samplingIntervalInMinutes. */
        public ?array $graph = null,
        /** Primary identifier for a radio under an access point. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
