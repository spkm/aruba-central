<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A RadioHistoryList record.
 */
readonly class RadioHistoryList extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $history
     */
    public function __construct(
        /** Timestamp */
        public ?int $timestamp = null,
        /** MAC address of a radio */
        public ?string $mac = null,
        /** AP Name where radio operates on */
        public ?string $ap_name = null,
        /** Band frequency */
        public ?string $band = null,
        /** A list of radio_history records. */
        public ?array $history = null,
    ) {}
}
