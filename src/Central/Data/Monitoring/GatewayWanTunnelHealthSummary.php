<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GatewayWanTunnelHealthSummary record.
 */
readonly class GatewayWanTunnelHealthSummary extends Data
{
    /**
     * @param  array<mixed>|null  $tunnelHealth
     */
    public function __construct(
        /** The cumulative health of the tunnel. One of: Good, Fair, Poor. */
        public ?string $health = null,
        /** The reason for the current health of the tunnel. One of: TUNNEL_STATUS, TUNNEL_ENCAPSULATION, TUNNEL_AUTHENTICATION, TUNNEL_ENCRYPTION. */
        public ?string $healthReasons = null,
        /** Tunnel health summary of gateway. Keys: good, fair, poor. */
        public ?array $tunnelHealth = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
