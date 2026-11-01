<?php

namespace spkm\ArubaCentral\Classic\Data\Msp;

use spkm\ArubaCentral\Data\Data;

/**
 * A LicenseAndDevices record.
 */
readonly class LicenseAndDevices extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $deviceList
     */
    public function __construct(
        /** Keys: activate_credentials_used, devices, enable_device_sync, enable_hardware_sync, license_expired, next_sync_available, total_devices. */
        public ?array $deviceList = null,
        /** status */
        public ?string $status = null,
    ) {}
}
