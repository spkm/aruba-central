<?php

namespace spkm\ArubaCentral\Classic\Data\VisualRf;

use spkm\ArubaCentral\Data\Data;

/**
 * A FloorListAccessPoint record.
 */
readonly class FloorListAccessPoint extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $floor
     * @param  array<mixed>|null  $access_points
     */
    public function __construct(
        /** floor information Keys: floor_id, floor_name, building_id, floor_level, floor_width, floor_length, ceiling_height, units. */
        public ?array $floor = null,
        /** Provides location information about access points A list of access_point records. */
        public ?array $access_points = null,
        /** Provides accesspoint count without limits */
        public ?int $access_point_count = null,
    ) {}
}
