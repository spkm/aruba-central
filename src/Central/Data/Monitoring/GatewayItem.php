<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GatewayItem record.
 */
readonly class GatewayItem extends Data
{
    public function __construct(
        public ?string $serialNumber = null,
        public ?string $macAddress = null,
        public ?string $deviceName = null,
        public ?int $cpuUtilization = null,
        public ?int $memoryUtilization = null,
        public ?string $siteId = null,
        public ?string $firmwareVersion = null,
        public ?string $ipAddress = null,
        public ?int $uptimeInMillis = null,
        public ?string $macRange = null,
        public ?string $rebootReason = null,
        public ?string $deviceFunction = null,
        public ?string $mode = null,
        public ?string $status = null,
        public ?string $role = null,
        public ?string $model = null,
        public ?string $siteName = null,
        public ?string $clusterName = null,
        public ?string $id = null,
        public ?string $type = null,
    ) {}
}
