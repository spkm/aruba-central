<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A UpdateDeviceNotesData record.
 */
readonly class UpdateDeviceNotesData extends Data
{
    public function __construct(
        /** Updated notes for the device. */
        public ?string $notes = null,
    ) {}
}
