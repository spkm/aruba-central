<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A DeviceSystemTime record.
 */
readonly class DeviceSystemTime extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $daylight_time_rule
     */
    public function __construct(
        public ?string $device_serial = null,
        public ?string $time_zone = null,
        /** Keys: begin_rule, end_rule. */
        public ?array $daylight_time_rule = null,
    ) {}
}
