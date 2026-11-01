<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A FullWlanData record.
 */
readonly class FullWlanData extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** "wlan": { "a_max_tx_rate": "54", "a_min_tx_rate":"6", "access_type":"unrestricted", "accounting_server1":"", "accounting_server2":"", "air_time_limit":"",… */
        public ?string $value = null,
    ) {}
}
