<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A Overlay record.
 */
readonly class Overlay extends Data
{
    public function __construct(
        /** status codes. */
        public ?string $code = null,
        /** One of: SUCCESS, INVALID_OPERATION, NOT_FOUND, FAILURE, PARTIAL_SUCCESS. */
        public ?string $status = null,
    ) {}
}
