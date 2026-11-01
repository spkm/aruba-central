<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A ReporterConnectorAssocResp record.
 */
readonly class ReporterConnectorAssocResp extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $reporterList
     */
    public function __construct(
        public ?string $collectorId = null,
        public ?string $customerId = null,
        public ?array $reporterList = null,
    ) {}
}
