<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A ImageUploadResource record.
 */
readonly class ImageUploadResource extends Data
{
    /**
     * @param  array<mixed>|null  $file_id
     */
    public function __construct(
        public ?array $file_id = null,
    ) {}
}
