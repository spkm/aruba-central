<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A PrioRfEvents record.
 */
readonly class PrioRfEvents extends Data
{
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?string $apSerial = null,
        public ?string $band = null,
        public ?string $eirpResolution = null,
        public ?string $eventTimestamp = null,
        public ?string $eventType = null,
        public ?string $newBandwidth = null,
        public ?string $newChannel = null,
        public ?string $newEirp = null,
        public ?string $newSecondaryChannel = null,
        public ?string $oldBandwidth = null,
        public ?string $oldChannel = null,
        public ?string $oldEirp = null,
        public ?string $oldSecondaryChannel = null,
        public ?string $radioMac = null,
        public ?string $siteId = null,
        public ?string $tenantId = null,
        public ?int $updateTimestamp = null,
        /** Monotonically increasing update counter */
        public ?int $generation = null,
        /** RFC 3339 creation timestamp */
        public ?CarbonImmutable $createdAt = null,
        /** RFC 3339 last update timestamp */
        public ?CarbonImmutable $updatedAt = null,
    ) {}
}
