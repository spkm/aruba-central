<?php

namespace spkm\ArubaCentral\Central\Data\Reporting;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A Report record.
 */
readonly class Report extends Data
{
    /**
     * @param  array<mixed>|null  $reportScope
     * @param  array<mixed>|null  $reportSchedule
     */
    public function __construct(
        public ?string $id = null,
        /** Type of the resource. */
        public ?string $type = null,
        /** Specifies the name of report or widgets */
        public ?string $name = null,
        /** Specifies the scope type and target values for the report Keys: scopeType, values. */
        public ?array $reportScope = null,
        /** Specifies the particular report type (lowerCamelCase or lowercase). Valid values: appAnalytics, capacityPlanning, clientInventory, clientSession, custom,… */
        public ?string $reportType = null,
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
        /** The user who modified the report / report schedule. */
        public ?string $lastModifiedBy = null,
        /** Specifies the report modified timestamp in UTC+0 timezone (RFC 3339 format). */
        public ?CarbonImmutable $lastModifiedAt = null,
        /** Specifies the report Schedule Keys: scheduleType, lastRunTs, lastRunStatus, nextRunTs, completedRuns, totalRuns, scheduleEnd. */
        public ?array $reportSchedule = null,
    ) {}
}
