<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A VersionHistory record.
 */
readonly class VersionHistory extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $appId = null,
        public ?int $lastUpdated = null,
        public ?int $version = null,
        public ?string $whatsNew = null,
    ) {}
}
