<?php

namespace spkm\ArubaCentral\Central\Data\Reporting;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A ReportsMetadata record.
 */
readonly class ReportsMetadata extends Data
{
    /**
     * @param  array<mixed>|null  $kpiWidgets
     */
    public function __construct(
        /** Unique identifier for the reports metadata resource. */
        public ?string $id = null,
        /** Resource type identifier. */
        public ?string $type = null,
        /** Monotonically increasing update counter. */
        public ?int $generation = null,
        /** Timestamp when the resource was created (RFC 3339 UTC). */
        public ?CarbonImmutable $createdAt = null,
        /** Timestamp when the resource was last updated (RFC 3339 UTC). */
        public ?CarbonImmutable $updatedAt = null,
        /** A list of KPIWidget records. */
        public ?array $kpiWidgets = null,
    ) {}
}
