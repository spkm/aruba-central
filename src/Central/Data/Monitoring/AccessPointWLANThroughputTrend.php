<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A AccessPointWLANThroughputTrend record.
 */
readonly class AccessPointWLANThroughputTrend extends Data
{
    /**
     * @param  array<mixed>|null  $graph
     */
    public function __construct(
        /** Metric for the throughput trend of an access point WLAN. */
        public ?string $metric = null,
        /** Keys: keys, samples, samplingIntervalInMinutes. */
        public ?array $graph = null,
        /** Primary identifier of a WLAN under an access point. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
