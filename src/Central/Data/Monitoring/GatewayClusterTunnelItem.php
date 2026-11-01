<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GatewayClusterTunnelItem record.
 */
readonly class GatewayClusterTunnelItem extends Data
{
    /**
     * @param  array<mixed>|null  $healthReasons
     */
    public function __construct(
        public ?string $tunnelName = null,
        public ?string $gateway = null,
        public ?string $gatewayRole = null,
        public ?string $health = null,
        public ?array $healthReasons = null,
        public ?string $status = null,
        public ?string $encapsulation = null,
        public ?string $destinationName = null,
        public ?string $destinationSerial = null,
        public ?string $destinationSite = null,
        public ?string $sourceIpAddress = null,
        public ?string $destinationIpAddress = null,
        public ?string $mode = null,
        public ?string $ssid = null,
        public mixed $vni = null,
        public ?int $uptime = null,
        public ?string $id = null,
        public ?string $type = null,
    ) {}
}
