<?php

namespace spkm\ArubaCentral\Classic\Data\CloudAuth;

use spkm\ArubaCentral\Data\Data;

/**
 * A RevokeCertRes record.
 */
readonly class RevokeCertRes extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?bool $revoked = null,
    ) {}
}
