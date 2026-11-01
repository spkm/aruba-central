<?php

namespace spkm\ArubaCentral\Classic\Data\Firmware;

use spkm\ArubaCentral\Data\Data;

/**
 * A FirmwareComplianceResp record.
 */
readonly class FirmwareComplianceResp extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Firmware compliance version for specific device_type. */
        public ?string $firmware_compliance_version = null,
        /** If firmware compliance scheduled then compliance_scheduled_at will be epoch time in seconds */
        public ?int $compliance_scheduled_at = null,
    ) {}
}
