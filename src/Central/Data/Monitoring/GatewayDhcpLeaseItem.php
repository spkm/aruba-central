<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GatewayDhcpLeaseItem record.
 */
readonly class GatewayDhcpLeaseItem extends Data
{
    public function __construct(
        public ?string $poolName = null,
        public ?string $ipAddress = null,
        public ?string $macAddress = null,
        public ?string $clientSiteId = null,
        public ?string $clientSerial = null,
        public mixed $infraType = null,
        public ?string $hostName = null,
        public ?string $clientDeviceType = null,
        public ?int $startTime = null,
        public ?int $expirationTime = null,
        public ?string $remainingTime = null,
        public ?string $reservation = null,
    ) {}
}
