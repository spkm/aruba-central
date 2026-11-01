<?php

namespace spkm\ArubaCentral\Classic\Data\Reports;

use spkm\ArubaCentral\Data\Data;

/**
 * A ResponseFramework record.
 */
readonly class ResponseFramework extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $report_data
     */
    public function __construct(
        public ?string $status = null,
        public ?int $status_code = null,
        /** Keys: policy_name. */
        public ?array $report_data = null,
    ) {}
}
