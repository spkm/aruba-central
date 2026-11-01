<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A GatewayTunnelItem record.
 */
readonly class GatewayTunnelItem extends Data
{
    /**
     * @param  array<mixed>|null  $healthReasons
     * @param  array<mixed>|null  $usage
     * @param  array<mixed>|null  $throughput
     */
    public function __construct(
        public ?string $tunnelName = null,
        public ?string $gateway = null,
        public ?string $health = null,
        public ?array $healthReasons = null,
        public ?string $status = null,
        public ?string $encapsulation = null,
        public ?string $sourceIpAddress = null,
        public ?string $destinationIpAddress = null,
        public ?string $mode = null,
        public mixed $vni = null,
        public ?string $uptime = null,
        public ?string $authentication = null,
        public ?string $encryption = null,
        public ?string $mtu = null,
        public ?CarbonImmutable $lastConnected = null,
        public mixed $greTunnelId = null,
        public mixed $greTunnelIpAddress = null,
        public ?array $usage = null,
        public ?array $throughput = null,
        public ?int $droppedPackets = null,
        public mixed $uplinkName = null,
        public ?int $vlanId = null,
        public ?int $inSpi = null,
        public ?int $outSpi = null,
        public ?string $macAddress = null,
        public ?string $peerType = null,
        public ?bool $natEnabled = null,
        public ?int $nextReKey = null,
        public mixed $lastDownReason = null,
        public ?string $tunnelType = null,
        public ?string $id = null,
        public ?string $type = null,
    ) {}
}
