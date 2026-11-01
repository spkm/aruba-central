<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A Vsx record.
 */
readonly class Vsx extends Data
{
    /**
     * @param  array<mixed>|null  $vsxHealth
     */
    public function __construct(
        /** The role of this device in the VSX pair (primary or secondary) One of: primary, secondary. */
        public ?string $role = null,
        /** The role of the VSX peer device One of: primary, secondary. */
        public ?string $peerRole = null,
        /** The Inter-Switch Link port on this device */
        public ?string $islPort = null,
        /** The Inter-Switch Link port on the peer device */
        public ?string $peerIslPort = null,
        /** The status of the VSX keepalive connection One of: established, failed, not-configured, unknown. */
        public ?string $keepaliveStatus = null,
        /** The health status of the keepalive connection One of: healthy, unhealthy, unknown. */
        public ?string $keepaliveHealth = null,
        /** The source IP address used for keepalive messages */
        public ?string $keepaliveSourceIp = null,
        /** The peer IP address for keepalive messages */
        public ?string $keepalivePeerIp = null,
        /** The port number used for keepalive communication */
        public ?string $keepalivePort = null,
        /** MAC address of this device */
        public ?string $mac = null,
        /** MAC address of the VSX peer device */
        public ?string $peerMac = null,
        /** Indicates if configuration synchronization is disabled. Defaults to false when not reported by the device. */
        public ?bool $configSyncDisable = null,
        /** State of configuration synchronization One of: synchronized, out-of-sync, in-progress, failed, disabled. */
        public ?string $configSyncStateValue = null,
        /** Overall health status of the configuration One of: ok, warning, error, unknown. */
        public ?string $configHealth = null,
        /** State of the ISL management connection One of: up, down, unknown. */
        public ?string $islMgmtStateValue = null,
        /** Network Analytics Engine state One of: enabled, disabled, unknown. */
        public ?string $naeStateValue = null,
        /** HTTPS server state for VSX One of: running, stopped, unknown. */
        public ?string $httpsServerStateValue = null,
        /** ISL protocol device state One of: active, inactive, unknown. */
        public ?string $islpDeviceStateValue = null,
        /** Health information for VSX components Keys: health, healthDescription. */
        public ?array $vsxHealth = null,
        /** Hostname or name of the VSX peer device */
        public ?string $vsxPeerName = null,
        /** Serial number of the VSX peer device */
        public ?string $vsxPeerSerial = null,
        /** Site ID where the VSX peer is located */
        public ?string $vsxPeerSiteId = null,
        /** Timestamp of the last successful synchronization (epoch milliseconds). This field may be null if VSX synchronization has not occurred yet or if the device does… */
        public ?string $lastSyncTimestamp = null,
    ) {}
}
