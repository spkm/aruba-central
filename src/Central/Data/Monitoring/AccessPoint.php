<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A AccessPoint record.
 */
readonly class AccessPoint extends Data
{
    /**
     * @param  array<mixed>|null  $gatewayClusters
     * @param  array<mixed>|null  $apStats
     * @param  array<mixed>|null  $radios
     * @param  array<mixed>|null  $ports
     * @param  array<mixed>|null  $modem
     * @param  array<mixed>|null  $wlans
     */
    public function __construct(
        /** The access point serial number. */
        public ?string $serialNumber = null,
        /** The access point MAC address. */
        public ?string $macAddress = null,
        /** The unique identifier of the site to which the access point has been assigned. */
        public ?string $siteId = null,
        /** The access point name. */
        public ?string $deviceName = null,
        /** IPv4 address of the access point. */
        public ?string $ipv4 = null,
        /** IPv6 address of the access point. */
        public ?string $ipv6 = null,
        /** Hardware model of the access point. */
        public ?string $model = null,
        /** Firmware version currently running on the access point. */
        public ?string $firmwareVersion = null,
        /** Status of the access point, which can be either ONLINE or OFFLINE. One of: ONLINE, OFFLINE. */
        public ?string $status = null,
        /** An RFC 3339 date-time indicating the last detected time of the access point in the system. If the access point is online, this value will be null. */
        public ?CarbonImmutable $lastSeenAt = null,
        /** Elapsed time in milliseconds since the access point's last boot. This value will be null if the access point is offline. */
        public ?float $uptimeInMillis = null,
        /** Last reboot reason description: * UNKNOWN: 'Unknown' * AP_RELOAD: 'Reload' * USER_REBOOT: 'User reboot' * WRITE_ERASE_REBOOT: 'Write erase reboot' *… */
        public ?string $lastRebootReason = null,
        /** Manufacturer of the access point. */
        public ?string $manufacturer = null,
        /** The power negotiated on the ethernet port of the access point. One of: 802.3bt, 802.3af, 802.3at, DC power, -. */
        public ?string $negotiatedPower = null,
        /** Role of the access point in the network topology. */
        public ?string $role = null,
        /** The operating mode of the access point. */
        public ?string $deployment = null,
        /** The operating band of the access point. Possible values are Dual band, Tri band, Dual 5 GHz, Tri radio, Flexible 5 GHz/6 GHz, or Flexible 2.4 GHz/6 GHz. */
        public ?string $bandSelection = null,
        /** IP address logged by servers when the access point device is connected through internet connection. */
        public ?string $publicIpv4 = null,
        /** Country code in which the access point operates. */
        public ?string $countryCode = null,
        /** The operational mode of the access point. The possible values are : 'Client Access', 'Air Monitor', 'Dedicated Spectrum' and 'Hybrid Spectrum' */
        public ?string $mode = null,
        /** The IP address and the source of default gateway. The possible values for source are 'DHCP' and 'Static' */
        public ?string $defaultGateway = null,
        /** Subnet mask assigned to the access point IPv4 interface. */
        public ?string $subnetMask = null,
        /** Mesh role of the access point when mesh is configured. */
        public ?string $meshRole = null,
        /** Identifier of the uplink interface currently used by the access point. */
        public ?string $currentUplinkInUse = null,
        /** Notes or comments about the access point. */
        public ?string $notes = null,
        /** List of gateway clusters associated with the AP tunnel. A list of GatewayCluster records. */
        public ?array $gatewayClusters = null,
        /** Access point statistics including CPU utilization, memory utilization, and client count. Keys: cpuUtilization, memoryUtilization, clientCount. */
        public ?array $apStats = null,
        /** List of access point radios A list of AccessPointRadio records. */
        public ?array $radios = null,
        /** List of access point ports A list of AccessPointPort records. */
        public ?array $ports = null,
        /** Access point modem attributes, such as manufacturer, simState, status, state, model, imei, imsi, iccid, firmwareVersion, and bandwidth. Keys: manufacturer, simState, status, state, model, imei, imsi, iccid, firmwareVersion, accessTechnology…. */
        public ?array $modem = null,
        /** List of WLANs associated with the access point A list of WlanInfo records. */
        public ?array $wlans = null,
        /** Indicates whether the access point is in hibernate mode. */
        public ?bool $hibernate = null,
        /** Traffic forwarding mode. This value will be null when the forwarding mode is not applicable or not available. This field is supported on firmware versions… One of: UNDERLAY, OVERLAY, MIXED. */
        public ?string $forwardMode = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
