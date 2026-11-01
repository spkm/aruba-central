<?php

namespace spkm\ArubaCentral\Classic\Data\Firmware;

use spkm\ArubaCentral\Data\Data;

/**
 * A FirmwareDeviceDetails record.
 */
readonly class FirmwareDeviceDetails extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $status
     */
    public function __construct(
        /** Serial of device */
        public ?string $serial = null,
        /** Mac address of device */
        public ?string $mac_address = null,
        /** Host name of device */
        public ?string $hostname = null,
        /** Model of device */
        public ?string $model = null,
        /** If false then manually reboot the device after upgrade else use action command to reboot it */
        public ?bool $is_reboot_enable = null,
        /** Up or Down */
        public ?string $device_status = null,
        /** Recommended firmware version */
        public ?string $recommended = null,
        /** Firmware version of device */
        public ?string $firmware_version = null,
        /** Firmware upgrade required or not */
        public ?bool $upgrade_required = null,
        /** Whether switch is stacked. Applicable only for Aruba switches */
        public ?bool $is_stack = null,
        /** Keys: state, reason, firmware_scheduled_at. */
        public ?array $status = null,
    ) {}
}
