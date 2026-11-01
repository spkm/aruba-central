<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A FullWlanListData record.
 */
readonly class FullWlanListData extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** "wlans": { "name": "wlan1", "essid": "wlan1", "type": "employee", "is_locked": true } */
        public ?string $value = null,
    ) {}
}
