<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A ExclusionType record.
 */
readonly class ExclusionType extends Data
{
    public function __construct(
        /** The exclusion type identifier (string value). */
        public ?string $id = null,
        /** Resource type identifier */
        public ?string $type = null,
        /** Human-readable name. */
        public ?string $name = null,
        /** Description of what this type excludes. */
        public ?string $description = null,
        /** Time of resource creation (RFC 3339 date-time string) */
        public ?CarbonImmutable $createdAt = null,
        /** Time of the last resource update (RFC 3339 date-time string) */
        public ?CarbonImmutable $updatedAt = null,
        /** Monotonically increasing update counter */
        public ?int $generation = null,
    ) {}
}
