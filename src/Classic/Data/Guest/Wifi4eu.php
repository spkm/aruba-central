<?php

namespace spkm\ArubaCentral\Classic\Data\Guest;

use spkm\ArubaCentral\Data\Data;

/**
 * A Wifi4eu record.
 */
readonly class Wifi4eu extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** String to indicate if WiFi4EU has been provisioned successfully or not. */
        public ?string $Status = null,
    ) {}
}
