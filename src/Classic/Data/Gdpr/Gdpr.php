<?php

namespace spkm\ArubaCentral\Classic\Data\Gdpr;

use spkm\ArubaCentral\Data\Data;

/**
 * A Gdpr record.
 */
readonly class Gdpr extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** MAC address of the gdpr client */
        public ?string $mac = null,
    ) {}
}
