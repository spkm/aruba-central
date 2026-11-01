<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A Device record.
 */
readonly class Device extends Data
{
    public function __construct(
        public ?string $serialNumber = null,
        public ?string $macAddress = null,
        public ?string $deviceName = null,
        public ?string $deviceType = null,
        public ?string $model = null,
        public ?string $partNumber = null,
        public ?string $deployment = null,
        public ?string $role = null,
        public ?string $deviceFunction = null,
        public ?string $firmwareVersion = null,
        public ?string $ipv4 = null,
        public ?string $ipv6 = null,
        public ?string $status = null,
        public ?int $uptimeInMillis = null,
        public mixed $lastSeenAt = null,
        public ?string $siteId = null,
        public ?string $buildingId = null,
        public ?string $floorId = null,
        public mixed $configStatus = null,
        public mixed $configLastModifiedAt = null,
        public ?string $siteName = null,
        public ?string $clusterName = null,
        public ?string $notes = null,
        public ?string $id = null,
        public ?string $type = null,
    ) {}
}
