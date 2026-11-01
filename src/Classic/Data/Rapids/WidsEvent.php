<?php

namespace spkm\ArubaCentral\Classic\Data\Rapids;

use spkm\ArubaCentral\Data\Data;

/**
 * A WidsEvent record.
 */
readonly class WidsEvent extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Station MAC address */
        public ?string $macaddr = null,
        /** AP that detected the event */
        public ?string $detected_ap = null,
        /** WIDS event type */
        public ?string $event_type = null,
        /** WIDS event level */
        public ?string $level = null,
        /** Timestamp at which the event happened */
        public ?int $event_time = null,
        /** Radio band on which the AP detected the event */
        public ?string $radio_band = null,
        /** WIDS event description */
        public ?string $description = null,
    ) {}
}
