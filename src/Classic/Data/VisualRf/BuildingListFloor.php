<?php

namespace spkm\ArubaCentral\Classic\Data\VisualRf;

use spkm\ArubaCentral\Data\Data;

/**
 * A BuildingListFloor record.
 */
readonly class BuildingListFloor extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $building
     * @param  array<mixed>|null  $floors
     */
    public function __construct(
        /** building information Keys: building_id, building_name, campus_id, latitude, longitude. */
        public ?array $building = null,
        /** Provides floor definitions for each building in a campus A list of floor records. */
        public ?array $floors = null,
        /** Provides floor count without limits */
        public ?int $floor_count = null,
    ) {}
}
