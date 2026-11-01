<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GatewayTunnelHealthSummary record.
 */
readonly class GatewayTunnelHealthSummary extends Data
{
    /**
     * @param  array<mixed>|null  $tunnelHealth
     */
    public function __construct(
        /** Specifies the type of encapsulation used for the tunnel configured on the gateway. One of: IPSec, GRE, vxlan. */
        public ?string $encapsulation = null,
        /** Tunnel health summary of gateway. Keys: good, fair, poor. */
        public ?array $tunnelHealth = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
