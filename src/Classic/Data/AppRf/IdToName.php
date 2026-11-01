<?php

namespace spkm\ArubaCentral\Classic\Data\AppRf;

use spkm\ArubaCentral\Data\Data;

/**
 * A IdToName record.
 */
readonly class IdToName extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** id to name mapping */
        public ?string $id = null,
    ) {}
}
