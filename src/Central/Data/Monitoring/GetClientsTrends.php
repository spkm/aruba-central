<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GetClientsTrends record.
 */
readonly class GetClientsTrends extends Data
{
    /**
     * @param  array<mixed>|null  $keys
     * @param  array<mixed>|null  $samples
     */
    public function __construct(
        /** List of categories available for a selected filter */
        public ?array $keys = null,
        /** List of data samples. A list of DataPoint records. */
        public ?array $samples = null,
        /** Interval based on given start-at and end-at. One of: 5 mins, 3 hours. */
        public ?string $interval = null,
        /** The type of the resource. */
        public ?string $type = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
    ) {}
}
