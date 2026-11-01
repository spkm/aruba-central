<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A ClusterMemberItem record.
 */
readonly class ClusterMemberItem extends Data
{
    public function __construct(
        public ?string $clusterName = null,
        public ?string $ipv4 = null,
        public ?string $ipv6 = null,
        public ?CarbonImmutable $lastSeenAt = null,
        public ?string $macAddress = null,
        public ?string $model = null,
        public ?string $deviceName = null,
        public ?string $partNumber = null,
        public ?string $role = null,
        public ?string $serialNumber = null,
        public ?string $siteId = null,
        public ?string $siteName = null,
        public ?string $softwareVersion = null,
        public ?string $firmwareVersion = null,
        public ?string $status = null,
        public ?string $id = null,
        public ?string $type = null,
    ) {}
}
