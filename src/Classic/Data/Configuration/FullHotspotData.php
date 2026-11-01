<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A FullHotspotData record.
 */
readonly class FullHotspotData extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** "hotspot": { "name": "aruba-passpoint", "mode": "HS2", "enable": false, "comeback_mode": false, "gas_comeback_delay": 0, "release_number": 0, "asra": false,… */
        public ?string $value = null,
    ) {}
}
