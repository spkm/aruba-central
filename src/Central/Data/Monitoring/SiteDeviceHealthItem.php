<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A site's device health by device type.
 */
readonly class SiteDeviceHealthItem extends Data
{
    /**
     * @param  array<mixed>|null  $deviceTypes
     */
    public function __construct(
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
        /** Name of the site. */
        public ?string $siteName = null,
        /** A list of EntityNameHealth records. */
        public ?array $deviceTypes = null,
    ) {}
}
