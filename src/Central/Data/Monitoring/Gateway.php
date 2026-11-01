<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A Gateway record.
 */
readonly class Gateway extends Data
{
    public function __construct(
        /** The gateway serial number. */
        public ?string $serialNumber = null,
        /** The gateway MAC address. */
        public ?string $macAddress = null,
        /** The gateway name. */
        public ?string $deviceName = null,
        /** The latest CPU utilization of the gateway, expressed as a percentage (0–100). */
        public ?float $cpuUtilization = null,
        /** The latest memory utilization of the gateway, expressed as a percentage (0–100). */
        public ?float $memoryUtilization = null,
        public ?string $siteId = null,
        /** Firmware version currently running on the gateway. */
        public ?string $firmwareVersion = null,
        /** IP address of the VLAN. */
        public ?string $ipAddress = null,
        /** Elapsed time in milliseconds since the gateway's last boot. This value will be null if the gateway is offline. */
        public ?float $uptimeInMillis = null,
        /** The MAC address range allocated to the gateway. */
        public ?string $macRange = null,
        /** The last reboot reason of the gateway. */
        public ?string $rebootReason = null,
        /** Device function (Persona identifier) for the gateway. One of: Unspecified, Mobility Controller, Branch Gateway, VPNC. */
        public ?string $deviceFunction = null,
        /** The operating mode of the gateway. One of: Standalone, Cluster. */
        public ?string $mode = null,
        /** The status of the gateway, either Online or Offline. One of: Online, Offline. */
        public ?string $status = null,
        /** Role of the gateway in the gateway cluster. One of: Isoleader, Leader, Member. */
        public ?string $role = null,
        /** The gateway model. */
        public ?string $model = null,
        /** The site to which the gateway is assigned. */
        public ?string $siteName = null,
        /** The cluster to which the gateway belongs. */
        public ?string $clusterName = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
