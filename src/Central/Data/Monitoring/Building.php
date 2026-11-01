<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A Building record.
 */
readonly class Building extends Data
{
    /**
     * @param  array<mixed>|null  $properties
     */
    public function __construct(
        /** building Id associated with the site in UUID format. */
        public ?string $buildingId = null,
        /** Keys: name, siteId. */
        public ?array $properties = null,
    ) {}
}
