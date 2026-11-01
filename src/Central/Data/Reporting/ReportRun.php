<?php

namespace spkm\ArubaCentral\Central\Data\Reporting;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A ReportRun record.
 */
readonly class ReportRun extends Data
{
    /**
     * @param  array<mixed>|null  $exportDetails
     */
    public function __construct(
        public ?string $id = null,
        /** Type of the resource. */
        public ?string $type = null,
        /** Specifies the report run start timestamp in UTC+0 timezone (RFC 3339 format). */
        public ?CarbonImmutable $fromTs = null,
        /** Specifies the report run end timestamp in UTC+0 timezone (RFC 3339 format). */
        public ?CarbonImmutable $toTs = null,
        /** Specifies the report export status as New, In Progress, Completed, or Failed One of: RUNNING, EXPORTING, COMPLETED, FAILED, EXPORT_FAILED. */
        public ?string $status = null,
        /** The user who saved the report. */
        public ?string $createdBy = null,
        /** Specifies the report creation timestamp in UTC+0 timezone (RFC 3339 format). */
        public ?CarbonImmutable $createdAt = null,
        /** Monotonically increasing update counter for the report / report schedule resource. */
        public ?int $generation = null,
        /** The user who modified the report / report schedule. */
        public ?string $updatedBy = null,
        /** Specifies the report modified timestamp in UTC+0 timezone (RFC 3339 format). */
        public ?CarbonImmutable $updatedAt = null,
        /** Specifies the report run modified timestamp in UTC+0 timezone (RFC 3339 format). */
        public ?CarbonImmutable $modifiedAt = null,
        /** Specifies the Export Details */
        public ?array $exportDetails = null,
    ) {}
}
