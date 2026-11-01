<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A Pathloss record.
 */
readonly class Pathloss extends Data
{
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?int $pathlossAvg = null,
        public ?string $band = null,
        public ?string $bandwidth = null,
        public ?int $channel = null,
        public ?string $nbrMac = null,
        public ?int $pathloss = null,
        public ?string $reportingMac = null,
        public ?string $tenantId = null,
        public ?int $secondaryChannel = null,
        public ?int $timestamp = null,
        /** Monotonically increasing update counter */
        public ?int $generation = null,
        /** RFC 3339 creation timestamp */
        public ?CarbonImmutable $createdAt = null,
        /** RFC 3339 last update timestamp */
        public ?CarbonImmutable $updatedAt = null,
    ) {}
}
