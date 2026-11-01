<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A SwarmInfo record.
 */
readonly class SwarmInfo extends Data
{
    public function __construct(
        /** The unique identifier of the swarm (cluster). */
        public ?string $clusterId = null,
        /** The name of the cluster to which the device belongs. If the device is not part of any cluster, then the cluster name will be null. */
        public ?string $clusterName = null,
        /** The unique identifier of the site to which the access point has been assigned. */
        public ?string $siteId = null,
        /** The name of the conductor device in the swarm. */
        public ?string $conductorDeviceName = null,
        /** The serial number of the conductor device in the swarm. */
        public ?string $conductorSerialNumber = null,
        /** IPv4 address of the access point. */
        public ?string $ipv4 = null,
        /** IPv6 address of the access point. */
        public ?string $ipv6 = null,
        /** The number of members in the swarm. This field is only available in the swarm detail API, not in the list API. */
        public ?int $membersCount = null,
        /** Firmware version currently running on the access point. */
        public ?string $firmwareVersion = null,
        /** Public IP address of the swarm. */
        public ?string $publicIpAddress = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
