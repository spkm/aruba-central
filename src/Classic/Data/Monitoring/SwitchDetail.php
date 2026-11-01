<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A SwitchDetail record.
 */
readonly class SwitchDetail extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $labels
     * @param  array<mixed>|null  $uplink_ports
     */
    public function __construct(
        /** Switch ID */
        public ?string $serial = null,
        /** Switch Name */
        public ?string $name = null,
        /** Switch MAC address */
        public ?string $macaddr = null,
        /** Switch Model */
        public ?string $model = null,
        /** Group Name to which the Switch belongs to */
        public ?string $group_name = null,
        /** Status is Up or Down */
        public ?string $status = null,
        /** Public Ip address of the Switch */
        public ?string $public_ip_address = null,
        /** Ip address of the Switch */
        public ?string $ip_address = null,
        /** Firmware version of the Switch */
        public ?string $firmware_version = null,
        /** Default gateway of the switch */
        public ?string $default_gateway = null,
        /** Switch uptime */
        public ?int $uptime = null,
        /** Timestamp at which the switch data was last updated in Central */
        public ?int $updated_at = null,
        /** Switch Mode */
        public ?int $device_mode = null,
        /** Number of Switch Clients */
        public ?int $total_clients = null,
        /** Switch usage */
        public ?int $usage = null,
        /** Power supplied to switch. */
        public ?int $max_power = null,
        /** Power consumed by the switch */
        public ?int $power_consumption = null,
        /** Fan speed of the switch */
        public ?string $fan_speed = null,
        /** Switch Temperature */
        public ?string $temperature = null,
        /** list of labels assigned to Switch */
        public ?array $labels = null,
        /** site assigned to Switch */
        public ?string $site = null,
        /** list of uplink ports of the Switch */
        public ?array $uplink_ports = null,
        /** Is switch of chassis type. */
        public ?bool $chassis_type = null,
        /** Current Switch CPU utilization percentage. */
        public ?int $cpu_utilization = null,
        /** Switch total memory */
        public ?int $mem_total = null,
        /** Switch free memory */
        public ?int $mem_free = null,
        /** Switch NAE aggregate status. This is only applicable for CX switches */
        public ?string $nae_aggr_status = null,
        /** Switch PoE consumption */
        public ?string $poe_consumption = null,
        /** Type of the switch.For CX Switches type is ArubaCX where as for PVOS switches type is ArubaSwitch. MAAS stands for Aruba MAS Switches. One of: ArubaCX, ArubaSwitch, MAAS. */
        public ?string $switch_type = null,
        /** stack_id if device id is member of Stack else null */
        public ?string $stack_id = null,
    ) {}
}
