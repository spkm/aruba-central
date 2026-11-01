<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A RFChannelQualityTrend record.
 */
readonly class RFChannelQualityTrend extends Data
{
    /**
     * @param  array<mixed>|null  $graph
     */
    public function __construct(
        /** Performance metric for the channel quality of an access point radio. */
        public ?string $metric = null,
        /** Keys: keys, samples, samplingIntervalInMinutes. */
        public ?array $graph = null,
        /** Primary identifier for a radio under an access point. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
