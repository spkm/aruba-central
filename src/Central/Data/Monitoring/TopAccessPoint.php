<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A TopAccessPoint record.
 */
readonly class TopAccessPoint extends Data
{
    public function __construct(
        /** The access point serial number. */
        public ?string $serialNumber = null,
        /** The access point name. */
        public ?string $deviceName = null,
        /** The overall amount of bandwidth used by the access point */
        public ?float $totalValue = null,
        /** The unit for measuring bandwidth usage value is set to Bytes by default. One of: Bytes. */
        public ?string $units = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
