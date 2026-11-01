<?php

namespace spkm\ArubaCentral\Classic\Data\Firmware;

use spkm\ArubaCentral\Data\Data;

/**
 * A FirmwareVersion record.
 */
readonly class FirmwareVersion extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Date of firmware image created */
        public ?string $create_date = null,
        /** Whether firmware image currently released or future release. Possible value for release_status are "release" and "beta" */
        public ?string $release_status = null,
        /** Firmware version */
        public ?string $firmware_version = null,
    ) {}
}
