<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A Exclusion record.
 */
readonly class Exclusion extends Data
{
    public function __construct(
        /** Unique identifier for the exclusion record */
        public ?string $id = null,
        /** Resource type identifier */
        public ?string $type = null,
        /** The ID of the exclusion type */
        public ?string $exclusionTypeId = null,
        /** The actual value to exclude. */
        public ?string $exclusionValue = null,
        /** When the exclusion was recorded (timestamp in RFC 3339 date-time string) */
        public ?CarbonImmutable $createdAt = null,
        /** Time of the last resource update (RFC 3339 date-time string) */
        public ?CarbonImmutable $updatedAt = null,
        /** User who created the exclusion */
        public ?string $createdBy = null,
        /** Monotonically increasing update counter */
        public ?int $generation = null,
    ) {}
}
