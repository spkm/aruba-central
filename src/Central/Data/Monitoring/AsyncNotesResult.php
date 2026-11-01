<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A AsyncNotesResult record.
 */
readonly class AsyncNotesResult extends Data
{
    /**
     * @param  array<mixed>|null  $logMessages
     */
    public function __construct(
        /** The unique identifier of the asynchronous notes update operation. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
        /** The URI of the resource that initiated the asynchronous operation. */
        public ?string $sourceResourceUri = null,
        /** The state of the asynchronous operation. One of: INITIALIZED, RUNNING, SUCCEEDED, FAILED, CANCELLED, TIMEDOUT. */
        public ?string $state = null,
        /** Percentage completion of the operation (0–100). */
        public ?int $progressPercent = null,
        /** ISO 8601 timestamp indicating when the operation started processing. `null` if not yet started. */
        public ?CarbonImmutable $startedAt = null,
        /** ISO 8601 timestamp indicating when the operation finished. `null` if not yet finished. */
        public ?CarbonImmutable $endedAt = null,
        /** Total number of devices in the request. */
        public ?int $total = null,
        /** Number of devices whose notes were updated successfully. */
        public ?int $succeeded = null,
        /** Number of devices whose notes update failed. */
        public ?int $failed = null,
        /** Detailed per-device results. `null` before processing begins. */
        public mixed $results = null,
        /** Error details if the entire operation failed. `null` otherwise. */
        public mixed $error = null,
        /** Chronological log messages describing the progress of the operation. A list of AsyncOperationLogMessage records. */
        public ?array $logMessages = null,
    ) {}
}
