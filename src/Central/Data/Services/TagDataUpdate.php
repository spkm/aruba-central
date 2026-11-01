<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use spkm\ArubaCentral\Data\Data;

/**
 * A TagDataUpdate record.
 */
readonly class TagDataUpdate extends Data
{
    /**
     * @param  array<mixed>|null  $data
     */
    public function __construct(
        /** Keys: tagMutationGenericResponse. */
        public ?array $data = null,
    ) {}
}
