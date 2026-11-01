<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A ClusterTunnelHealthSummary record.
 */
readonly class ClusterTunnelHealthSummary extends Data
{
    /**
     * @param  array<mixed>|null  $tunnelHealth
     */
    public function __construct(
        /** The gateway name. */
        public ?string $deviceName = null,
        /** The gateway serial number. */
        public ?string $serialNumber = null,
        public ?string $siteId = null,
        /** Tunnel health summary for a cluster member. Keys: good, fair, poor. */
        public ?array $tunnelHealth = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
