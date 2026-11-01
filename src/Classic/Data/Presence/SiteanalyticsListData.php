<?php

namespace spkm\ArubaCentral\Classic\Data\Presence;

use spkm\ArubaCentral\Data\Data;

/**
 * A SiteanalyticsListData record.
 */
readonly class SiteanalyticsListData extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?int $drawrate_count = null,
        public ?int $dwelltime_count = null,
        public ?int $loyal_visitors = null,
        public ?int $new_visitors = null,
        public ?int $passerby_count = null,
        public ?int $site_id = null,
        public ?string $site_name = null,
        public ?int $store_id = null,
        public ?string $store_name = null,
        public ?int $total_connected = null,
        public ?int $visitor_count = null,
        public ?int $visits = null,
    ) {}
}
