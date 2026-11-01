<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A PortCrcTrend record.
 */
readonly class PortCrcTrend extends Data
{
    /**
     * @param  array<mixed>|null  $graph
     */
    public function __construct(
        /** Metric for the CRC trends of an access point port. */
        public ?string $metric = null,
        /** Keys: keys, samples, samplingIntervalInMinutes. */
        public ?array $graph = null,
        /** Primary identifier of a port under an access point. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
