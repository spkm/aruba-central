<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A CdaDppRegCreate record.
 */
readonly class CdaDppRegCreate extends Data
{
    public function __construct(
        /** ID of the DPP registraton. */
        public ?string $id = null,
    ) {}
}
