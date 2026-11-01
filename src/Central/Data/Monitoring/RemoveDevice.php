<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A RemoveDevice record.
 */
readonly class RemoveDevice extends Data
{
    /**
     * @param  array<mixed>|null  $deviceRemoveResults
     */
    public function __construct(
        /** Keys: successDevices, failedDevices, code, status, message. */
        public ?array $deviceRemoveResults = null,
        /** status code. */
        public ?string $code = null,
        /** final status. */
        public ?string $status = null,
        /** status message. */
        public ?string $message = null,
    ) {}
}
