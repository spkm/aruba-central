<?php

namespace spkm\ArubaCentral\Classic\Data\VisualRf;

use spkm\ArubaCentral\Data\Data;

/**
 * A Campus record.
 */
readonly class Campus extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** ID identifying a specific campus */
        public ?string $campus_id = null,
        /** Name of the campus location */
        public ?string $campus_name = null,
    ) {}
}
