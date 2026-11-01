<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A ImportStatus record.
 */
readonly class ImportStatus extends Data
{
    public function __construct(
        public ?string $id = null,
        /** API type. */
        public ?string $type = null,
        public ?string $error = null,
        public ?string $state = null,
    ) {}
}
