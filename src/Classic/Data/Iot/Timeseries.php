<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A Timeseries record.
 */
readonly class Timeseries extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $datapoints
     * @param  array<mixed>|null  $reporter
     */
    public function __construct(
        public ?string $collectorId = null,
        public ?string $customerId = null,
        /** A list of DataPointResponse records. */
        public ?array $datapoints = null,
        public ?string $deviceId = null,
        public ?string $metricName = null,
        public ?array $reporter = null,
    ) {}
}
