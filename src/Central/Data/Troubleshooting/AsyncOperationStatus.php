<?php

namespace spkm\ArubaCentral\Central\Data\Troubleshooting;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A AsyncOperationStatus record.
 */
readonly class AsyncOperationStatus extends Data
{
    public function __construct(
        /** The relative URL path to query the status and result of the asynchronous operation. */
        public ?string $location = null,
        /** The initial status of the operation. One of: INITIATED. */
        public ?string $status = null,
        /** ISO 8601 timestamp indicating when the operation was initiated. */
        public ?CarbonImmutable $startTime = null,
    ) {}
}
