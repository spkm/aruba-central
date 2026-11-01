<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A UnmanagedDevice record.
 */
readonly class UnmanagedDevice extends Data
{
    public function __construct(
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** Name of the unmanaged device */
        public ?string $name = null,
        /** This value follows the format tpd_<mac>, where the mac address is used without colons */
        public ?string $serial = null,
        /** Device type, e.g., Switch, Router, Access Point */
        public ?string $type = null,
        /** MAC address of the device */
        public ?string $mac = null,
        /** Capabilities supported by the device */
        public ?string $supportedCapability = null,
        /** Capabilities currently enabled on the device. */
        public ?string $enabledCapability = null,
        /** Additional description or notes about the device */
        public ?string $description = null,
        /** Vendor or manufacturer of the device */
        public ?string $vendor = null,
        /** Operational status of the device */
        public ?string $status = null,
    ) {}
}
