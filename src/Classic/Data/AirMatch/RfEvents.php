<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A RfEvents record.
 */
readonly class RfEvents extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Timestamp */
        public ?int $timestamp = null,
        /** MAC address */
        public ?string $mac = null,
        /** Time Duration */
        public ?int $duration = null,
        /** Event Type */
        public ?string $event_type = null,
        /** Channel */
        public ?int $channel = null,
        /** Bandwidth */
        public ?string $bandwidth = null,
        /** Secondary Frequancy Segment */
        public ?int $secondary_freq_segment = null,
        /** New Channel */
        public ?int $new_channel = null,
        /** New Channel Bandwidth */
        public ?string $new_bandwidth = null,
        /** New Secondary Frequency Segment */
        public ?int $new_secondary_freq_segment = null,
    ) {}
}
