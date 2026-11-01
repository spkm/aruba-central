<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A Risk record.
 */
readonly class Risk extends Data
{
    public function __construct(
        /** Risk level identifier. One of: HIGH, MEDIUM, LOW. */
        public ?string $id = null,
        /** Resource type. */
        public ?string $type = null,
        /** Monotonically increasing update counter. */
        public ?int $generation = null,
        /** Creation timestamp in RFC 3339 format. */
        public ?CarbonImmutable $createdAt = null,
        /** Last update timestamp in RFC 3339 format. */
        public ?CarbonImmutable $updatedAt = null,
        /** Human-readable risk level name. */
        public ?string $displayName = null,
        /** Number of applications at this risk level. */
        public ?int $count = null,
    ) {}
}
