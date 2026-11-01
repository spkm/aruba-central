<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A Count record.
 */
readonly class Count extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?int $value = null,
    ) {}
}
