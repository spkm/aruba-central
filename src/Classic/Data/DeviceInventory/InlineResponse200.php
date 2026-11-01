<?php

namespace spkm\ArubaCentral\Classic\Data\DeviceInventory;

use spkm\ArubaCentral\Data\Data;

/**
 * A InlineResponse200 record.
 */
readonly class InlineResponse200 extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $available_devices
     * @param  array<mixed>|null  $blocked_devices
     * @param  array<mixed>|null  $invalid_devices
     */
    public function __construct(
        /** A list of DeviceDetails records. */
        public ?array $available_devices = null,
        /** A list of DeviceDetails records. */
        public ?array $blocked_devices = null,
        /** A list of InvalidDeviceDetails records. */
        public ?array $invalid_devices = null,
    ) {}
}
