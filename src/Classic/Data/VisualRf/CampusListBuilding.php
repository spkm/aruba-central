<?php

namespace spkm\ArubaCentral\Classic\Data\VisualRf;

use spkm\ArubaCentral\Data\Data;

/**
 * A CampusListBuilding record.
 */
readonly class CampusListBuilding extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $campus
     * @param  array<mixed>|null  $buildings
     */
    public function __construct(
        /** Campus contains buildings with individual floor maps. Keys: campus_id, campus_name. */
        public ?array $campus = null,
        /** Provides information about the buildings within each campus structure A list of building records. */
        public ?array $buildings = null,
        /** Provides building count without limits */
        public ?int $building_count = null,
    ) {}
}
