<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A AccessPointDHCPPoolItem record.
 */
readonly class AccessPointDHCPPoolItem extends Data
{
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?string $poolName = null,
        public ?int $vlan = null,
        public ?string $subnet = null,
        public ?int $leaseDurationInSecs = null,
        public ?int $availableAddresses = null,
        public ?int $poolSize = null,
        public ?int $utilization = null,
    ) {}
}
