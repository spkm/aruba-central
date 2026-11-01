<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A AdminDetails record.
 */
readonly class AdminDetails extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $username = null,
        public ?string $password = null,
    ) {}
}
