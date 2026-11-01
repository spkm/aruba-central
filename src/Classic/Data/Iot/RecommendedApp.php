<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A RecommendedApp record.
 */
readonly class RecommendedApp extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $appId = null,
        public ?string $icon = null,
        public ?int $latestVersion = null,
        public ?string $name = null,
        public ?string $recommendationType = null,
        public ?string $shortDescription = null,
        public ?string $vendor = null,
    ) {}
}
