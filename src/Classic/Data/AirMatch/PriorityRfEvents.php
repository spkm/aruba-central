<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A PriorityRfEvents record.
 */
readonly class PriorityRfEvents extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Timestamp */
        public ?int $timestamp = null,
        /** MAC address */
        public ?string $mac = null,
        /** Event Type */
        public ?string $event_type = null,
        /** Channel */
        public ?int $channel = null,
        /** Bandwidth */
        public ?string $bandwidth = null,
        /** Band */
        public ?string $band = null,
    ) {}
}
