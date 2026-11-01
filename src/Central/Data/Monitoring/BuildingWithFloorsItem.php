<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A BuildingWithFloorsItem record.
 */
readonly class BuildingWithFloorsItem extends Data
{
    /**
     * @param  array<mixed>|null  $floors
     * @param  array<mixed>|null  $properties
     */
    public function __construct(
        /** API type. */
        public ?string $type = null,
        /** id of the building associated with the site commonly in UUID format. */
        public ?string $id = null,
        /** building Id associated with the site in UUID format. */
        public ?string $buildingId = null,
        public ?array $floors = null,
        public ?array $properties = null,
    ) {}
}
