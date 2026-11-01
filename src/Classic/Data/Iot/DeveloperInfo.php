<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A DeveloperInfo record.
 */
readonly class DeveloperInfo extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $developerId = null,
        public ?bool $enabled = null,
    ) {}
}
