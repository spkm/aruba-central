<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A WallsItem record.
 */
readonly class WallsItem extends Data
{
    /**
     * @param  array<mixed>|null  $geometryRelative
     * @param  array<mixed>|null  $properties
     */
    public function __construct(
        /** walltype ID associated with the customer in UUID format. */
        public ?string $id = null,
        /** feature type. */
        public ?string $featureType = null,
        /** feature. */
        public ?string $type = null,
        public ?array $geometryRelative = null,
        public ?array $properties = null,
    ) {}
}
