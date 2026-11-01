<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A SwitchDetails record.
 */
readonly class SwitchDetails extends Data
{
    /**
     * @param  array<mixed>|null  $healthReasons
     * @param  array<mixed>|null  $switchTrends
     */
    public function __construct(
        /** Serial of the switch. */
        public ?string $id = null,
        /** API type. */
        public ?string $type = null,
        /** Link type for switch */
        public ?string $switchLinkType = null,
        /** Type of the switch, e.g., pvos or cx */
        public ?string $switchType = null,
        public ?string $serialNumber = null,
        /** The switch IP address in IPv4 format */
        public ?string $ipv4 = null,
        /** The status of the switch */
        public ?string $status = null,
        /** The switch IP address in IPv6 format */
        public ?string $ipv6 = null,
        /** The MAC address of the switch */
        public ?string $macAddress = null,
        /** Public IP address of the switch */
        public ?string $publicIp = null,
        /** Model of the switch */
        public ?string $model = null,
        /** Health status of the switch */
        public ?string $health = null,
        /** SiteName */
        public ?string $siteName = null,
        /** Keys: poorReasons, fairReasons. */
        public ?array $healthReasons = null,
        public ?string $siteId = null,
        /** The elapsed time in milliseconds since the last boot. */
        public ?float $uptimeInMillis = null,
        /** Current firmware version of the switch */
        public ?string $firmwareVersion = null,
        /** Deployment mode of the switch */
        public ?string $deployment = null,
        /** Job number or identifier */
        public ?string $jNumber = null,
        /** Timestamp when the switch was last seen online */
        public ?float $lastSeenAt = null,
        /** Name of the switch */
        public ?string $deviceName = null,
        /** Role of the switch in the network */
        public ?string $switchRole = null,
        /** Manufacturer of the switch */
        public ?string $manufacturer = null,
        /** Timestamp of the last configuration change */
        public ?float $lastConfigChange = null,
        /** Reason for the last restart */
        public ?string $lastRestartReason = null,
        /** Keys: serialNumber, switchRole, cpuUtilization, memoryUtilization, poeAvailable, poeConsumption, powerConsumption, totalPowerConsumption, systemTemperature, upLinkPorts…. */
        public ?array $switchTrends = null,
    ) {}
}
