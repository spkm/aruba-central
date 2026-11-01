<?php

namespace spkm\ArubaCentral\Classic\Data\DeviceManagement;

use spkm\ArubaCentral\Data\Data;

/**
 * A MobilityDeviceMMInfo record.
 */
readonly class MobilityDeviceMMInfo extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $device_serial = null,
        public ?string $mobility_master = null,
    ) {}
}
