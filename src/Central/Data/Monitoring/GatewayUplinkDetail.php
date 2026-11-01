<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GatewayUplinkDetail record.
 */
readonly class GatewayUplinkDetail extends Data
{
    /**
     * @param  array<mixed>|null  $usage
     * @param  array<mixed>|null  $throughput
     */
    public function __construct(
        public ?string $linkTag = null,
        /** The overall status of the uplink. One of: Up, Down. */
        public ?string $status = null,
        /** The WAN status of the uplink. One of: Up, Down. */
        public ?string $wanStatus = null,
        /** The link status of the uplink. One of: Up, Down. */
        public ?string $linkStatus = null,
        /** IP address logged when the uplink is connected to the gateway. */
        public ?string $publicIpAddress = null,
        /** Private IP of the uplink connected to the gateway. */
        public ?string $privateIpAddress = null,
        /** The VLAN ID configured in the gateway. */
        public ?int $vlanId = null,
        /** Indicates if this uplink is a backup uplink. */
        public ?bool $isBackupUplink = null,
        /** Bandwidth usage statistics of the uplink. Keys: received, sent, total. */
        public ?array $usage = null,
        /** Current throughput statistics for the WAN tunnel. Keys: received, sent. */
        public ?array $throughput = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
