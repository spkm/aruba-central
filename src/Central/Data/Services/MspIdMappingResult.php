<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use spkm\ArubaCentral\Data\Data;

/**
 * A MspIdMappingResult record.
 */
readonly class MspIdMappingResult extends Data
{
    /**
     * @param  array<mixed>|null  $mapping
     * @param  array<mixed>|null  $notFoundMapping
     */
    public function __construct(
        public ?array $mapping = null,
        public ?array $notFoundMapping = null,
    ) {}
}
