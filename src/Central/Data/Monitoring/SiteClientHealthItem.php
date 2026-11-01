<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A site's client health by client type.
 */
readonly class SiteClientHealthItem extends Data
{
    /**
     * @param  array<mixed>|null  $clientTypes
     */
    public function __construct(
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
        /** Name of the site. */
        public ?string $siteName = null,
        /** A list of ClientEntityNameHealth records. */
        public ?array $clientTypes = null,
    ) {}
}
