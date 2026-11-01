<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A UplinksDistribution record.
 */
readonly class UplinksDistribution extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Uplink name */
        public ?string $link_tag = null,
        /** Number of each uplink */
        public ?float $count = null,
    ) {}
}
