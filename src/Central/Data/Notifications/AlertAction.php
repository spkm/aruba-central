<?php

namespace spkm\ArubaCentral\Central\Data\Notifications;

use spkm\ArubaCentral\Data\Data;

/**
 * A AlertAction record.
 */
readonly class AlertAction extends Data
{
    public function __construct(
        /** Response message indicating the action was accepted. */
        public ?string $response = null,
        /** Unique task identifier for tracking the asynchronous operation. */
        public ?string $taskId = null,
        /** URL to check the status of the asynchronous operation. */
        public ?string $location = null,
    ) {}
}
