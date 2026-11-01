<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A DeviceplacementPost record.
 */
readonly class DeviceplacementPost extends Data
{
    /**
     * @param  array<mixed>|null  $devicesPlacementResults
     */
    public function __construct(
        public ?array $devicesPlacementResults = null,
        /** status code. */
        public ?string $code = null,
        /** final status. */
        public ?string $status = null,
        /** status message. */
        public ?string $message = null,
    ) {}
}
