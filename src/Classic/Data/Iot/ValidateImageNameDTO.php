<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A ValidateImageNameDTO record.
 */
readonly class ValidateImageNameDTO extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?bool $valid = null,
    ) {}
}
