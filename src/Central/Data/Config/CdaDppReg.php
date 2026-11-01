<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A CdaDppReg record.
 */
readonly class CdaDppReg extends Data
{
    public function __construct(
        /** ID of the DPP registration */
        public ?string $id = null,
        /** DPP uri. */
        public ?string $uri = null,
    ) {}
}
