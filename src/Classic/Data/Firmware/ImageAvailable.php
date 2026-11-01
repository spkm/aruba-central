<?php

namespace spkm\ArubaCentral\Classic\Data\Firmware;

use spkm\ArubaCentral\Data\Data;

/**
 * A ImageAvailable record.
 */
readonly class ImageAvailable extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Whether firmware image is available */
        public ?bool $available = null,
        /** Whether firmware image is supported or not */
        public ?bool $supported = null,
    ) {}
}
