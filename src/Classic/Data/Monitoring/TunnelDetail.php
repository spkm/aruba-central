<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A TunnelDetail record.
 */
readonly class TunnelDetail extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Tunnel id */
        public ?int $map_id = null,
        /** Tunnel Name */
        public ?string $name = null,
        /** Tunnel Status */
        public ?string $status = null,
        /** Source IP address of the Tunnel */
        public ?string $source_ip = null,
        /** Destination IP address of the Tunnel */
        public ?string $destination_ip = null,
        /** Tunnel's Uplink tag */
        public ?int $uplink_tag = null,
        /** Tunnel's Uplink port */
        public ?string $uplink_port = null,
        /** VLAN id */
        public ?int $vlan_id = null,
        /** Tunnel's last down reason */
        public ?string $last_down_reason = null,
        /** Tunnel uptime in seconds */
        public ?int $connected_uptime = null,
    ) {}
}
