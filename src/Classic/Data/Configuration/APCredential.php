<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A APCredential record.
 */
readonly class APCredential extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** user name */
        public ?string $username = null,
        /** encrypted password */
        public ?string $password = null,
    ) {}
}
