<?php

namespace spkm\ArubaCentral\Classic\Data\Topology;

use spkm\ArubaCentral\Data\Data;

/**
 * A DeviceDetails record.
 */
readonly class DeviceDetails extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $device
     */
    public function __construct(
        /** Keys: cid, click_disabled, cpuUsage, health, healthReason, ipAddress, macAddress, memoryUsage, model, name…. */
        public ?array $device = null,
        /** Status code. 200 = success, 400 = failure */
        public ?int $status_code = null,
    ) {}
}
