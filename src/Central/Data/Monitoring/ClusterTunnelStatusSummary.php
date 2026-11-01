<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A ClusterTunnelStatusSummary record.
 */
readonly class ClusterTunnelStatusSummary extends Data
{
    public function __construct(
        /** The number of tunnels that are Up. */
        public ?int $up = null,
        /** The number of tunnels that are Down. */
        public ?int $down = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
