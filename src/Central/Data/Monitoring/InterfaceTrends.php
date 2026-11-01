<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A InterfaceTrends record.
 */
readonly class InterfaceTrends extends Data
{
    /**
     * @param  array<mixed>|null  $keys
     * @param  array<mixed>|null  $samples
     * @param  array<mixed>|null  $units
     */
    public function __construct(
        /** identifier. */
        public ?string $id = null,
        /** Device type of monitoring. */
        public ?string $type = null,
        /** Trends name. */
        public ?string $metric = null,
        /** Interface name for which the api called. */
        public ?string $interfaceId = null,
        /** To identify uplink interfaces. */
        public ?bool $uplink = null,
        /** Trends list. */
        public ?array $keys = null,
        /** Samples for the interface trends in the key list. A list of Sample records. */
        public ?array $samples = null,
        /** Units for the interface trends in the keys list. */
        public ?array $units = null,
    ) {}
}
