<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A Site record.
 */
readonly class Site extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Site ID */
        public ?int $site_id = null,
        /** Site name */
        public ?string $site_name = null,
    ) {}
}
