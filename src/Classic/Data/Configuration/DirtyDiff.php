<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A DirtyDiff record.
 */
readonly class DirtyDiff extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $name = null,
        public ?string $id = null,
        public ?string $dirty_diff = null,
    ) {}
}
