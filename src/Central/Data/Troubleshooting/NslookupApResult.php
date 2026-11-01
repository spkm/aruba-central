<?php

namespace spkm\ArubaCentral\Central\Data\Troubleshooting;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A NslookupApResult record.
 */
readonly class NslookupApResult extends Data
{
    /**
     * @param  array<mixed>|null  $output
     */
    public function __construct(
        /** The final or current status of the operation. One of: INITIATED, RUNNING, COMPLETED, FAILED. */
        public ?string $status = null,
        /** Percentage completion of the operation (0-100). */
        public ?int $progressPercent = null,
        /** ISO 8601 timestamp indicating when the operation was initiated. */
        public ?CarbonImmutable $startTime = null,
        /** ISO 8601 timestamp indicating when the operation finished (null if not finished). */
        public ?CarbonImmutable $endTime = null,
        public ?array $output = null,
    ) {}
}
