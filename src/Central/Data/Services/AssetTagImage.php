<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use spkm\ArubaCentral\Data\Data;

/**
 * A AssetTagImage record.
 */
readonly class AssetTagImage extends Data
{
    public function __construct(
        /** The UUID identifier of the Asset Tag. */
        public ?string $id = null,
        /** Resource type. */
        public ?string $type = null,
    ) {}
}
