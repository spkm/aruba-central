<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use spkm\ArubaCentral\Data\Data;

/**
 * A OperationResult record.
 */
readonly class OperationResult extends Data
{
    public function __construct(
        public ?bool $success = null,
        public ?string $message = null,
    ) {}
}
