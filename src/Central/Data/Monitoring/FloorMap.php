<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A FloorMap record.
 */
readonly class FloorMap extends Data
{
    /**
     * @param  array<mixed>|null  $properties
     */
    public function __construct(
        /** API type. */
        public ?string $type = null,
        /** floorId associated with the site commonly in UUID format. */
        public ?string $id = null,
        public ?string $floorId = null,
        public ?string $tenantId = null,
        /** Keys: name, ordinal, length, breadth, buildingId, siteId. */
        public ?array $properties = null,
    ) {}
}
