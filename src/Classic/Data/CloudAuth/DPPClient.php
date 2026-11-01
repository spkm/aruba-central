<?php

namespace spkm\ArubaCentral\Classic\Data\CloudAuth;

use spkm\ArubaCentral\Data\Data;

/**
 * A DPPClient record.
 */
readonly class DPPClient extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** DPP client Id. */
        public ?string $id = null,
        /** DPP URI */
        public ?string $uri = null,
    ) {}
}
