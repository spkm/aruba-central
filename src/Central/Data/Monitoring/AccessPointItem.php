<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A AccessPointItem record.
 */
readonly class AccessPointItem extends Data
{
    /**
     * @param  array<mixed>|null  $gatewayClusters
     */
    public function __construct(
        public ?string $serialNumber = null,
        public ?string $macAddress = null,
        public ?string $deviceName = null,
        public ?string $model = null,
        public ?string $partNumber = null,
        public ?string $deployment = null,
        public ?string $role = null,
        public ?string $deviceFunction = null,
        public ?string $firmwareVersion = null,
        public ?string $ipv4 = null,
        public ?string $ipv6 = null,
        public ?string $publicIpv4 = null,
        public ?string $status = null,
        public mixed $lastSeenAt = null,
        public ?string $siteId = null,
        public ?string $siteName = null,
        public ?string $clusterName = null,
        public ?string $lastRebootReason = null,
        public ?string $deviceGroupId = null,
        public ?string $deviceGroupName = null,
        public ?string $clusterId = null,
        public ?int $cpuUtilization = null,
        public ?int $memoryUtilization = null,
        public ?float $powerConsumption = null,
        public ?int $clientCount = null,
        public ?int $wlanCount = null,
        public ?string $subnetMask = null,
        public ?string $meshRole = null,
        public ?int $uptimeInMillis = null,
        public ?string $buildingId = null,
        public ?array $gatewayClusters = null,
        public ?string $floorId = null,
        public ?bool $hibernate = null,
        public ?string $forwardMode = null,
        public ?string $id = null,
        public ?string $type = null,
    ) {}
}
