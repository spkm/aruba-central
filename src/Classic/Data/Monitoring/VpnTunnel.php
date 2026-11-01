<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A VpnTunnel record.
 */
readonly class VpnTunnel extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Primary or Backup tunnel. */
        public ?string $type = null,
        /** Status is Up or Down */
        public ?string $status = null,
        /** Tunnel is active or not. */
        public ?bool $active = null,
        /** Timestamp at which the VPN came up */
        public ?int $uptime = null,
        /** Encryption for the tunnel. */
        public ?string $crypto_type = null,
        /** FQDN/ip of the peer. */
        public ?string $peer_name = null,
        /** Peer tunnel ip. */
        public ?string $peer_tun_ip = null,
        /** Device internal tunnel IP */
        public ?string $tunnel_ip = null,
        /** Tunnel profile Name */
        public ?string $profile_name = null,
        /** Tunnel Name */
        public ?string $tunnel_name = null,
    ) {}
}
