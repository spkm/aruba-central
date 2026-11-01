<?php

namespace spkm\ArubaCentral\Classic\Data\VisualRf;

use spkm\ArubaCentral\Data\Data;

/**
 * A FloorObj record.
 */
readonly class FloorObj extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $floor
     */
    public function __construct(
        /** floor information Keys: floor_id, floor_name, building_id, floor_level, floor_width, floor_length, ceiling_height, units. */
        public ?array $floor = null,
    ) {}
}
