<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A DeviceassignmentPost record.
 */
readonly class DeviceassignmentPost extends Data
{
    /**
     * @param  array<mixed>|null  $devices
     */
    public function __construct(
        /** status code. */
        public ?string $code = null,
        /** final status. */
        public ?string $status = null,
        /** status message. */
        public ?string $message = null,
        public ?array $devices = null,
    ) {}
}
