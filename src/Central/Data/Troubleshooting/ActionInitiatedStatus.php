<?php

namespace spkm\ArubaCentral\Central\Data\Troubleshooting;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A ActionInitiatedStatus record.
 */
readonly class ActionInitiatedStatus extends Data
{
    public function __construct(
        /** ISO 8601 timestamp indicating when the action was initiated. */
        public ?CarbonImmutable $startTime = null,
        /** The initial status of the action. One of: INITIATED. */
        public ?string $status = null,
    ) {}
}
