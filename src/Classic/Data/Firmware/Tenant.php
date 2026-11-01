<?php

namespace spkm\ArubaCentral\Classic\Data\Firmware;

use spkm\ArubaCentral\Data\Data;

/**
 * A Tenant record.
 */
readonly class Tenant extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** If firmware upgrade scheduled then firmware_scheduled_at will be epoch time in seconds. */
        public ?int $firmware_scheduled_at = null,
        /** Firmware status for a tenant. */
        public ?string $status = null,
        /** Firmware compliance version for specific device_type. */
        public ?string $firmware_compliance_version = null,
        /** If firmware compliance scheduled then compliance_scheduled_at will be epoch time in seconds. */
        public ?int $compliance_scheduled_at = null,
    ) {}
}
