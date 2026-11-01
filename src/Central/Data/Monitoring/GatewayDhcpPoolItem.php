<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GatewayDhcpPoolItem record.
 */
readonly class GatewayDhcpPoolItem extends Data
{
    public function __construct(
        public ?string $poolName = null,
        public ?int $vlanId = null,
        public ?string $vlanName = null,
        public ?string $subnet = null,
        public ?int $leaseDuration = null,
        public ?int $poolSize = null,
        public ?int $currentLeases = null,
        public ?int $utilization = null,
        public ?int $availableAddresses = null,
    ) {}
}
