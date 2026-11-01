<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A AccessPointTunnelDetail record.
 */
readonly class AccessPointTunnelDetail extends Data
{
    public function __construct(
        /** The name of the tunnel. */
        public ?string $tunnelName = null,
        /** The index of the tunnel */
        public ?string $index = null,
        /** The name of the destination endpoint. */
        public ?string $destinationName = null,
        /** The MAC address of the destination endpoint. */
        public ?string $destinationMacAddress = null,
        /** The IP address of the destination endpoint. */
        public ?string $destinationIpAddress = null,
        /** The current status of the tunnel. */
        public ?string $status = null,
        /** The encapsulation type used for the tunnel. */
        public ?string $encapsulationType = null,
        /** The cryptographic key exchange type used by the tunnel. One of: TUNNEL_CRYPTO_TYPE_UNSPECIFIED, TUNNEL_CRYPTO_TYPE_CERTIFICATE, TUNNEL_CRYPTO_TYPE_PSK. */
        public ?string $cryptoType = null,
        /** The source IP address of the tunnel. */
        public ?string $sourceIpAddress = null,
        /** The reason for the last status change of the tunnel. */
        public ?string $lastChangeReason = null,
        /** The uptime of the tunnel in milliseconds. */
        public ?int $uptimeInMillis = null,
        /** Indicates whether the tunnel is active. */
        public ?bool $active = null,
        /** The type of the peer endpoint. */
        public ?string $peerType = null,
        /** The authentication method used for the tunnel. */
        public ?string $authentication = null,
        /** The encryption method used for the tunnel. */
        public ?string $encryption = null,
        /** The inbound Security Parameter Index (SPI) for the tunnel. */
        public ?float $inSpi = null,
        /** The outbound Security Parameter Index (SPI) for the tunnel. */
        public ?float $outSpi = null,
        /** Tunnel ID of an access point tunnel */
        public ?string $tunnelId = null,
        /** Identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
