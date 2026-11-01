<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GetClientsUsage record.
 */
readonly class GetClientsUsage extends Data
{
    /**
     * @param  array<mixed>|null  $keys
     * @param  array<mixed>|null  $samples
     */
    public function __construct(
        /** Fixed keys representing TX and RX byte usage. */
        public ?array $keys = null,
        /** List of data samples. Each sample contains [txUsage, rxUsage] in bytes. A list of DataPoint records. */
        public ?array $samples = null,
        /** Sampling interval based on the given timestamp filter range. One of: 5 mins, 3 hours. */
        public ?string $interval = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
