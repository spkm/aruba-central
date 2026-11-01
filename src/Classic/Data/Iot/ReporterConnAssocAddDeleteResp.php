<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A ReporterConnAssocAddDeleteResp record.
 */
readonly class ReporterConnAssocAddDeleteResp extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $failedActionReporterList
     */
    public function __construct(
        public ?string $collectorId = null,
        public ?array $failedActionReporterList = null,
    ) {}
}
