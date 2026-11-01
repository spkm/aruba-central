<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use spkm\ArubaCentral\Data\Data;

/**
 * A LaSitesInsightsForAPI record.
 */
readonly class LaSitesInsightsForAPI extends Data
{
    public function __construct(
        /** Site ID. */
        public ?string $id = null,
        /** Type of the analytics. */
        public ?string $type = null,
        /** Site ID. */
        public ?string $siteId = null,
        /** Name of the site. */
        public ?string $siteName = null,
        /** The number of new visitors for the site in the given time range. */
        public ?int $newVisitorCount = null,
        /** The number of recurring visitors for the site in the given time range. */
        public ?int $recurringVisitorCount = null,
        /** The number of total visitors for the site in the given time range. */
        public ?int $totalVisitorCount = null,
        /** The number of passerby for the site in the given time range. */
        public ?int $passerbyCount = null,
        /** The average visit duration (in minutes) for the site in the given time range. */
        public ?int $visitDuration = null,
    ) {}
}
