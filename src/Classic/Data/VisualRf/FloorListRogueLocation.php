<?php

namespace spkm\ArubaCentral\Classic\Data\VisualRf;

use spkm\ArubaCentral\Data\Data;

/**
 * A FloorListRogueLocation record.
 */
readonly class FloorListRogueLocation extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $floor
     * @param  array<mixed>|null  $rogue_location
     */
    public function __construct(
        /** floor information Keys: floor_id, floor_name, building_id, floor_level, floor_width, floor_length, ceiling_height, units. */
        public ?array $floor = null,
        /** A list of location_anonymization records. */
        public ?array $rogue_location = null,
        /** Provides location count without limits */
        public ?int $rogue_location_count = null,
    ) {}
}
