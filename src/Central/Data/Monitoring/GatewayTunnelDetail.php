<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GatewayTunnelDetail record.
 */
readonly class GatewayTunnelDetail extends Data
{
    /**
     * @param  array<mixed>|null  $healthReasons
     * @param  array<mixed>|null  $usage
     * @param  array<mixed>|null  $throughput
     */
    public function __construct(
        /** The name of the tunnel configured in the gateway. */
        public ?string $tunnelName = null,
        /** The name of the gateway to which the tunnel belongs. */
        public ?string $gateway = null,
        /** The health status of the LAN tunnel. One of: Good, Fair, Poor. */
        public ?string $health = null,
        /** Reasons contributing to the current health status of the tunnel. */
        public ?array $healthReasons = null,
        /** The operational status of the LAN tunnel. One of: Up, Down. */
        public ?string $status = null,
        /** Specifies the type of encapsulation used for the tunnel configured on the gateway. One of: IPSec, GRE, vxlan. */
        public ?string $encapsulation = null,
        /** IP address from which the tunnel originates. */
        public ?string $sourceIpAddress = null,
        /** IP address to which the tunnel terminates. */
        public ?string $destinationIpAddress = null,
        /** The mode of the tunnel. One of: Orchestrated, Orchestrated-IKE, Orchestrated-Survivability, IKE. */
        public ?string $mode = null,
        /** Encoded value used to uniquely identify the Layer 2 segment in a VXLAN network. It is null for tunnels other than VXLAN. */
        public ?int $vni = null,
        /** The uptime duration of the LAN tunnel. */
        public ?string $uptime = null,
        /** The authentication method used in the tunnel. One of: MD5, SHA-1, SHA-2 256, SHA-2 384, SHA-2 512, AES, . */
        public ?string $authentication = null,
        /** The encryption method used in the tunnel. One of: 3DES, AES-128, AES-192, AES-256, DES, BLOWFISH, AES-CTR, AES-GCM-128, AES-GCM-256, AES-GMAC, ESP-NULL. */
        public ?string $encryption = null,
        /** The MTU value of the port, in bytes. */
        public ?string $mtu = null,
        /** The last time the tunnel was connected. */
        public ?float $lastConnected = null,
        /** GRE tunnel identifier if applicable, null otherwise. */
        public ?string $greTunnelId = null,
        /** IP address of the GRE tunnel if applicable, null otherwise. */
        public ?string $greTunnelIpAddress = null,
        /** Bandwidth usage statistics for the LAN tunnel. Keys: received, sent, total. */
        public ?array $usage = null,
        /** Current throughput statistics for the LAN tunnel. Keys: received, sent. */
        public ?array $throughput = null,
        /** Number of packets dropped by the LAN tunnel. */
        public ?float $droppedPackets = null,
        /** Name of the uplink interface associated with the tunnel. */
        public ?string $uplinkName = null,
        /** VLAN ID associated with the LAN tunnel. */
        public ?int $vlanId = null,
        /** Inbound Security Parameter Index (SPI) for the tunnel. */
        public ?int $inSpi = null,
        /** Outbound Security Parameter Index (SPI) for the tunnel. */
        public ?int $outSpi = null,
        /** The source gateway MAC address. */
        public ?string $macAddress = null,
        /** Type of the tunnel peer. */
        public ?string $peerType = null,
        /** Indicates if NAT is enabled for the tunnel. */
        public ?bool $natEnabled = null,
        /** Timestamp for the next re-key event. */
        public ?int $nextReKey = null,
        /** The reason for the last time the tunnel was down. One of: SA expired, Tunnel not established, Uplink load balance configuration changed, Tunnel configuration removed by Administrator, DPD failure, Delete initiated by peer, Administrator cleared IPSEC SA, New tunnel to the same peer has been created, Unable to find IKE SA for IPSEC SA. */
        public ?string $lastDownReason = null,
        /** The type of the tunnel, either LAN or WAN. One of: LAN, WAN. */
        public ?string $tunnelType = null,
        /** Unique identifier for the LAN tunnel. */
        public ?string $id = null,
        /** Resource type identifier. */
        public ?string $type = null,
    ) {}
}
