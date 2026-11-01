<?php

namespace spkm\ArubaCentral\Classic\Data\VisualRf;

use spkm\ArubaCentral\Data\Data;

/**
 * A FloorImage record.
 */
readonly class FloorImage extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** background image base64 data */
        public ?string $background_image = null,
    ) {}
}
