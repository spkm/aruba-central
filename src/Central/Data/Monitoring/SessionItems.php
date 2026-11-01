<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A SessionItems record.
 */
readonly class SessionItems extends Data
{
    /**
     * @param  array<mixed>|null  $applicationCategories
     */
    public function __construct(
        /** Resource type. */
        public ?string $type = null,
        /** Resource ID: session_timestamp-src_ip-client_mac-dest_ip. */
        public ?string $id = null,
        /** The timestamp of the session in epoch milliseconds. */
        public ?string $timestamp = null,
        /** The serial number of the device reporting the session. */
        public ?string $serialNumber = null,
        /** The logged in username of the client. */
        public ?string $clientUsername = null,
        /** The MAC address of the client. */
        public ?string $clientMac = null,
        /** The IP address of the client. */
        public ?string $sourceIp = null,
        /** The IP address of the destination. */
        public ?string $destinationIp = null,
        /** The role assigned to the client. */
        public ?string $clientRole = null,
        /** The SSID that the client was connected to. */
        public ?string $ssidName = null,
        /** Boolean value indicating whether the client traffic was tunneled to the gateway or not. */
        public ?bool $tunneledTraffic = null,
        /** This represents whether the client is wireless or wired. */
        public ?string $clientConnectionType = null,
        /** The client VLAN. */
        public ?int $vlanId = null,
        /** The transmitted bytes. */
        public ?int $txBytes = null,
        /** The received bytes. */
        public ?int $rxBytes = null,
        /** String representing whether the session was permitted or denied. */
        public ?string $sessionType = null,
        /** The application that the client was accessing. */
        public ?string $applicationName = null,
        /** List of categories that applications belong to. */
        public ?array $applicationCategories = null,
        /** The URL of the application that was accessed by the client. */
        public ?string $webUrl = null,
        /** The category that the web URL belongs to. */
        public ?string $webCategories = null,
        /** Value representing the risk level of the web URL. */
        public ?string $webReputation = null,
        /** A string representing the reason of a blocked/denied session. */
        public ?string $blockedSessionReason = null,
        /** A string representing the device type that pertains to the current entry. */
        public ?string $deviceType = null,
        /** The number of blocked sessions. */
        public ?int $sessionCount = null,
        /** A string representing the source client hostname. */
        public ?string $clientHostname = null,
        /** A string representing the TLS version. */
        public ?string $tlsServerVersion = null,
        /** A string representing the timestamp of the certificate expiry date. */
        public ?string $certificateExpiryDate = null,
        /** The country name of the destination. */
        public ?string $destinationLocation = null,
    ) {}
}
