<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GatewayPort record.
 */
readonly class GatewayPort extends Data
{
    /**
     * @param  array<mixed>|null  $healthReasons
     * @param  array<mixed>|null  $usage
     * @param  array<mixed>|null  $throughput
     */
    public function __construct(
        public ?string $name = null,
        /** The health status of the wired interface. One of: Good, Fair, Poor. */
        public ?string $health = null,
        public ?array $healthReasons = null,
        /** The port number. */
        public ?string $portNumber = null,
        /** The Duplex of the port. One of: Full, Half, Auto. */
        public ?string $duplex = null,
        /** The data transmission rate of the port in Mbps. May be the value 'Auto' for ports with auto-negotiated speed. */
        public ?string $speed = null,
        /** The VLAN ID assigned to the port. */
        public ?string $vlan = null,
        /** The MTU value of the port, in bytes. */
        public ?string $mtu = null,
        /** Bandwidth usage statistics for the LAN tunnel. Keys: received, sent, total. */
        public ?array $usage = null,
        /** Bandwidth usage statistics for the tunnel. Keys: received, sent. */
        public ?array $throughput = null,
        /** The total number of packets transferred. */
        public ?int $totalPackets = null,
        /** The total number of broadcast packets transferred. */
        public ?int $broadcastPackets = null,
        /** The total number of multicast packets transferred. */
        public ?int $multicastPackets = null,
        /** The total number of CRC errors detected. */
        public ?int $crcErrors = null,
        /** The total number of collisions detected. */
        public ?int $collisions = null,
        /** The total number of runt packets detected. */
        public ?int $runts = null,
        /** The total number of giant packets detected. */
        public ?int $giants = null,
        /** The gateway port MAC address. */
        public ?string $macAddress = null,
        /** The administrative state of the port. One of: Enabled, Disabled. */
        public ?string $adminState = null,
        /** The operational state of the port. One of: Up, Down. */
        public ?string $operState = null,
        /** The VLAN mode of the port. One of: Access, Trunk. */
        public ?string $portType = null,
        /** The type of the port. One of: RJ45, SFP. */
        public ?string $connectorType = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
