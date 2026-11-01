<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A AppAPI record.
 */
readonly class AppAPI extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $message = null,
    ) {}
}
