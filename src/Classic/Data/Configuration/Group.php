<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A Group record.
 */
readonly class Group extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $group = null,
    ) {}
}
