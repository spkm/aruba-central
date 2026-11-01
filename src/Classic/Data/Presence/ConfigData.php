<?php

namespace spkm\ArubaCentral\Classic\Data\Presence;

use spkm\ArubaCentral\Data\Data;

/**
 * A ConfigData record.
 */
readonly class ConfigData extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $site_name = null,
        public ?string $site_id = null,
        public ?string $access_points = null,
        public ?int $conversion_time = null,
        public ?int $passer_by_threshold = null,
        public ?int $visitor_threshold = null,
    ) {}
}
