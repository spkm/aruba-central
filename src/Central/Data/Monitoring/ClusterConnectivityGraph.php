<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A ClusterConnectivityGraph record.
 */
readonly class ClusterConnectivityGraph extends Data
{
    /**
     * @param  array<mixed>|null  $nodes
     */
    public function __construct(
        /** Gateway and its peers Keys: name, role, health, serialNumber, peers. */
        public ?array $nodes = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
