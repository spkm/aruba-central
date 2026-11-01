<?php

namespace spkm\ArubaCentral\Classic\Data\Presence;

use spkm\ArubaCentral\Data\Data;

/**
 * A V2Thresholds record.
 */
readonly class V2Thresholds extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** visitor dwelltime in minutes */
        public ?int $dwelltime = null,
        /** visitor rssi between -100 dBm to 0 dBm */
        public ?int $rssi = null,
        /** passerby rssi between -100 dBm to 0 dBm */
        public ?int $passerby_rssi = null,
    ) {}
}
