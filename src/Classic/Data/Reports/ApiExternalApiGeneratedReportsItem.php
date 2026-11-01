<?php

namespace spkm\ArubaCentral\Classic\Data\Reports;

use spkm\ArubaCentral\Data\Data;

/**
 * A ApiExternalApiGeneratedReportsItem record.
 */
readonly class ApiExternalApiGeneratedReportsItem extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Unique ID of the report */
        public ?string $report_id = null,
        /** Name of the report */
        public ?string $report_name = null,
        /** Specifies the type of report created */
        public ?string $report_type = null,
        /** Date on which report ran or its scheduled to run */
        public ?int $scheduled_at = null,
        /** Specifies the timezone of the report */
        public ?string $time_zone = null,
        /** Status of report being created */
        public ?string $status = null,
    ) {}
}
