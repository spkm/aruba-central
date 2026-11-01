<?php

namespace spkm\ArubaCentral\Classic\Data\Topology;

use spkm\ArubaCentral\Data\Data;

/**
 * A TopologyDetails record.
 */
readonly class TopologyDetails extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $devices
     * @param  array<mixed>|null  $edges
     * @param  array<mixed>|null  $tunnels
     * @param  array<mixed>|null  $uplink_nodes
     * @param  array<mixed>|null  $rootNodes
     */
    public function __construct(
        /** A list of device_schema records. */
        public ?array $devices = null,
        /** A list of edge_schema records. */
        public ?array $edges = null,
        /** A list of tunnel_schema records. */
        public ?array $tunnels = null,
        /** A list of uplink_node_schema records. */
        public ?array $uplink_nodes = null,
        /** List of serial numbers of root nodes in the topology. All controllers are considered as root nodes. So, there can be multiple root nodes. When no controllers… */
        public ?array $rootNodes = null,
        /** Status of the response. 200 = success, 400 = failure */
        public ?int $status_code = null,
    ) {}
}
