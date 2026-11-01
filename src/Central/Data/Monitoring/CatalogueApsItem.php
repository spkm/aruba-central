<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A CatalogueApsItem record.
 */
readonly class CatalogueApsItem extends Data
{
    public function __construct(
        /** Catalogue Ap model */
        public ?string $id = null,
        /** Catalogue AP part number. */
        public ?string $partNumber = null,
        /** Catalogue AP manufacturer. */
        public ?string $manufacturer = null,
        /** network-monitoring/catalogue-aps */
        public ?string $type = null,
    ) {}
}
