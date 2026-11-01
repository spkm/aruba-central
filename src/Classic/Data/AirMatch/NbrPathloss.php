<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A NbrPathloss record.
 */
readonly class NbrPathloss extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Timestamp */
        public ?int $timestamp = null,
        /** Reporting MAC address */
        public ?string $reporting_mac = null,
        /** Neighbor MAC address */
        public ?string $nbr_mac = null,
        /** If it is a Friend AP */
        public ?bool $is_friend = null,
        /** Pathloss */
        public ?int $pathloss = null,
        /** Channel */
        public ?int $channel = null,
        /** Channel Bandwidth */
        public ?string $bandwidth = null,
        /** Secondary Frequency */
        public ?int $sec_freq = null,
        /** Channel Band */
        public ?string $band = null,
    ) {}
}
