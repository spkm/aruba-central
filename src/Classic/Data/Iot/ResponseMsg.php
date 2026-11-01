<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A ResponseMsg record.
 */
readonly class ResponseMsg extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $message = null,
    ) {}
}
