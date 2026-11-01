<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A AccessPointCPUUtilization record.
 */
readonly class AccessPointCPUUtilization extends Data
{
    /**
     * @param  array<mixed>|null  $graph
     */
    public function __construct(
        /** Hardware performance metric for the CPU utilization of an access point. */
        public ?string $metric = null,
        /** Keys: keys, samples, samplingIntervalInMinutes. */
        public ?array $graph = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
