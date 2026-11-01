<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A ApplicationCategoryUsageItem record.
 */
readonly class ApplicationCategoryUsageItem extends Data
{
    public function __construct(
        /** The unique identifier of the application category. */
        public ?string $id = null,
        /** Resource type. */
        public ?string $type = null,
        /** Monotonically increasing update counter. */
        public ?int $generation = null,
        /** Creation timestamp in RFC 3339 format. */
        public ?CarbonImmutable $createdAt = null,
        /** Last update timestamp in RFC 3339 format. */
        public ?CarbonImmutable $updatedAt = null,
        /** Human-readable application category name. */
        public ?string $displayName = null,
        /** Bytes transmitted from clients for this category. */
        public ?float $txBytes = null,
        /** Bytes received by clients for this category. */
        public ?float $rxBytes = null,
    ) {}
}
