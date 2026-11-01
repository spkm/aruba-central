<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A Client record.
 */
readonly class Client extends Data
{
    public function __construct(
        /** Specifies the name of the client. */
        public ?string $clientName = null,
        /** Specifies the status of the client. One of: Connected, Failed, Connecting, Disconnected, Blocked. */
        public ?string $status = null,
        /** Type of connected device (AP/Switch/Gateway). */
        public ?string $connectedDeviceType = null,
        /** Specifies the client type. One of: Wired, Wireless, Remote. */
        public ?string $clientConnectionType = null,
        /** Specifies the MAC address of the client. */
        public ?string $macAddress = null,
        /** Specifies the IPv4 address of the client. */
        public ?string $ipv4 = null,
        /** Specifies the IPv6 address of the client. */
        public ?string $ipv6 = null,
        /** Specifies the serial number of the connected device. */
        public ?string $connectedDeviceSerial = null,
        /** Specifies the device name that the client is connected to. */
        public ?string $connectedTo = null,
        /** The date and time when the client was last detected in the system. If the client is online, this value will be 0. */
        public ?CarbonImmutable $lastSeenAt = null,
        /** Specifies the network identifier. */
        public ?string $wlanName = null,
        /** Specifies the port to which the client is connected, or null if not applicable. */
        public ?string $port = null,
        /** Specifies the role of the client. */
        public ?string $role = null,
        /** Specifies the VLAN ID associated with the client. */
        public ?string $vlanId = null,
        /** Specifies the VLAN name associated with the client. */
        public ?string $vlanName = null,
        /** Specifies the tunnel type associated with the client. Possible values are "Port-based", "User-based", "Overlay", and "None". "None" indicates no tunnel. */
        public ?string $tunnelType = null,
        /** Specifies the tunnel ID associated with the client. */
        public ?int $tunnelId = null,
        /** Specifies the timestamp when the client was connected. */
        public ?CarbonImmutable $connectedAt = null,
        /** The client's username. */
        public ?string $userName = null,
        /** The client's hostname. */
        public ?string $hostName = null,
        /** Specifies the wireless security protocol used by the client. */
        public ?string $wirelessSecurity = null,
        /** Specifies the manufacturer of the client device. */
        public ?string $clientManufacturer = null,
        /** Specifies the functional category of the client device. */
        public ?string $clientFunction = null,
        /** Specifies the vendor of the client device. */
        public ?string $clientVendor = null,
        /** OS model of the client device. */
        public ?string $clientOperatingSystem = null,
        /** Comma-separated tags associated with the client. */
        public ?string $clientTags = null,
        /** Specifies the category of the client device. */
        public ?string $clientCategory = null,
        /** The name of the site where the client is located. */
        public ?string $siteName = null,
        /** A unique identifier for the site where the client is located. */
        public ?string $siteId = null,
        /** Wireless frequency band used by the client. */
        public ?string $wirelessBand = null,
        /** The wireless channel number on which the client is operating. */
        public ?string $wirelessChannel = null,
        /** The BSSID to which the client is connected on the device. */
        public ?string $bssid = null,
        /** The radio MAC address to which the client is connected on the device. */
        public ?string $radioMacAddress = null,
        /** Security mode used by the client. */
        public ?string $keyManagement = null,
        /** Authentication type used by the client to connect with the device. */
        public ?string $authenticationType = null,
        /** Client 802.11 capabilities. */
        public ?string $clientCapabilities = null,
        /** The type of the resource. */
        public ?string $type = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** Specifies the signal-to-noise ratio (SNR) of the client's wireless connection. Higher values indicate better signal quality. */
        public ?int $snr = null,
        /** Specifies the Multi-Link Operation (MLO) mode used by the client for Wi-Fi 7 connectivity. */
        public ?string $mloOperMode = null,
        /** Specifies the IEEE 802.11 physical layer standard used for the client's current connection. */
        public ?string $phyType = null,
    ) {}
}
