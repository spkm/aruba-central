<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GatewayPortItem record.
 */
readonly class GatewayPortItem extends Data
{
    /**
     * @param  array<mixed>|null  $healthReasons
     * @param  array<mixed>|null  $usage
     * @param  array<mixed>|null  $throughput
     */
    public function __construct(
        public ?string $name = null,
        public ?string $health = null,
        public ?array $healthReasons = null,
        public ?string $portNumber = null,
        public ?string $duplex = null,
        public ?string $speed = null,
        public ?string $vlan = null,
        public ?string $mtu = null,
        public ?array $usage = null,
        public ?array $throughput = null,
        public ?int $totalPackets = null,
        public ?int $broadcastPackets = null,
        public ?int $multicastPackets = null,
        public ?int $crcErrors = null,
        public ?int $collisions = null,
        public ?int $runts = null,
        public ?int $giants = null,
        public ?string $macAddress = null,
        public ?string $adminState = null,
        public ?string $operState = null,
        public ?string $portType = null,
        public ?string $connectorType = null,
        public ?string $id = null,
        public ?string $type = null,
    ) {}
}
