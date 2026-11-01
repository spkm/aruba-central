<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A IsolatedNodes record.
 */
readonly class IsolatedNodes extends Data
{
    /**
     * @param  array<mixed>|null  $isolatedDevices
     */
    public function __construct(
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** Type of topology or device group */
        public ?string $type = null,
        /** List of isolated devices associated with the site */
        public ?array $isolatedDevices = null,
    ) {}
}
