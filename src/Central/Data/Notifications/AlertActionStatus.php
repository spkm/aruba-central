<?php

namespace spkm\ArubaCentral\Central\Data\Notifications;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A AlertActionStatus record.
 */
readonly class AlertActionStatus extends Data
{
    /**
     * @param  array<mixed>|null  $logMessages
     * @param  array<mixed>|null  $error
     */
    public function __construct(
        /** Unique identifier for this async operation resource. */
        public ?string $id = null,
        /** Resource type identifier. */
        public ?string $type = null,
        /** The URI of the source resource associated with this operation. */
        public ?string $sourceResourceUri = null,
        /** The current state of the asynchronous operation. One of: PENDING, IN_PROGRESS, SUCCEEDED, FAILED. */
        public ?string $state = null,
        /** Timestamp when the operation started. */
        public ?CarbonImmutable $startedAt = null,
        /** Timestamp when the operation ended. */
        public ?CarbonImmutable $endedAt = null,
        /** Log messages associated with the operation. A list of LogMessage records. */
        public ?array $logMessages = null,
        /** The progress percentage of the operation. */
        public ?int $progressPercent = null,
        /** Error details for a failed async operation. Keys: code, message, details. */
        public ?array $error = null,
    ) {}
}
