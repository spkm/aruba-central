<?php

namespace spkm\ArubaCentral\Classic\Data\VisualRf;

use spkm\ArubaCentral\Data\Data;

/**
 * A LocationObj record.
 */
readonly class LocationObj extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $location
     */
    public function __construct(
        /** properties of a device location message Keys: x, y, units, error_level, campus_id, building_id, floor_id, associated, device_mac. */
        public ?array $location = null,
    ) {}
}
