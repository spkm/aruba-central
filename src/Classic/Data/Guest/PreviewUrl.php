<?php

namespace spkm\ArubaCentral\Classic\Data\Guest;

use spkm\ArubaCentral\Data\Data;

/**
 * A PreviewUrl record.
 */
readonly class PreviewUrl extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** URL to preview portal. */
        public ?string $preview_url = null,
    ) {}
}
