<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A SiteInfo record.
 */
readonly class SiteInfo extends Data
{
    public function __construct(
        /** Unique identifier for the site */
        public ?string $scopeId = null,
        /** Name of the site */
        public ?string $scopeName = null,
    ) {}
}
