<?php

namespace spkm\ArubaCentral\Classic\Data\Presence;

use spkm\ArubaCentral\Data\Data;

/**
 * A CategoryValueV3 record.
 */
readonly class CategoryValueV3 extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $bucket = null,
        public ?int $count = null,
    ) {}
}
