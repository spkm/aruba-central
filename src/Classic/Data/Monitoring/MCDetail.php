<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A MCDetail record.
 */
readonly class MCDetail extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $labels
     * @param  array<mixed>|null  $uplinks
     * @param  array<mixed>|null  $location
     * @param  array<mixed>|null  $ntp_server_info
     * @param  array<mixed>|null  $modem_info
     * @param  array<mixed>|null  $uplinks_metric
     * @param  array<mixed>|null  $tunnels_metric
     */
    public function __construct(
        /** Serial number */
        public ?string $serial = null,
        /** Device Name */
        public ?string $name = null,
        /** MAC address */
        public ?string $macaddr = null,
        /** Group name to which device belongs to */
        public ?string $group_name = null,
        /** Status is Up or Down */
        public ?string $status = null,
        /** IP address */
        public ?string $ip_address = null,
        /** Model number */
        public ?string $model = null,
        /** Firmware version */
        public ?string $firmware_version = null,
        /** list labels assigned */
        public ?array $labels = null,
        /** site assigned */
        public ?string $site = null,
        /** List of Device uplinks A list of Uplink records. */
        public ?array $uplinks = null,
        /** Current CPU utilization */
        public ?int $cpu_utilization = null,
        /** Uptime in seconds */
        public ?int $uptime = null,
        /** Total memory */
        public ?int $mem_total = null,
        /** Free memory */
        public ?int $mem_free = null,
        /** Backup firmware version */
        public ?string $firmware_backup_version = null,
        /** MAC range */
        public ?string $mac_range = null,
        /** Device Role */
        public ?string $role = null,
        /** Number of APs connected to the device */
        public ?int $ap_count = null,
        /** Device usage */
        public ?string $usage = null,
        /** Device last reboot reason */
        public ?string $reboot_reason = null,
        /** Mode of Device */
        public ?string $mode = null,
        /** Device PoE budget in mW */
        public ?int $poe_budget = null,
        /** Device PoE consumption in mW */
        public ?int $poe_consumption = null,
        /** Device PoE available in mW */
        public ?int $poe_available = null,
        /** Device PoE supportability */
        public ?bool $poe_supported = null,
        /** Device recommended firmware version */
        public ?string $recommended_version = null,
        /** Keys: gps, street_address. */
        public ?array $location = null,
        /** EST enrollment status of virtual gateway */
        public ?string $est_status = null,
        /** EST expiry time of virtual gateway */
        public ?string $est_cert_expiry_time = null,
        /** Bandwidth limit of virtual gateway */
        public ?int $vgw_sys_bw_limit = null,
        /** Bandwidth usage of virtual gateway */
        public ?int $vgw_sys_bw_usage = null,
        /** Details of the NTP server configured Keys: server, sync. */
        public ?array $ntp_server_info = null,
        /** Details of LTE Modem plugged in Keys: type, hwstate. */
        public ?array $modem_info = null,
        /** Keys: up, down, total. */
        public ?array $uplinks_metric = null,
        /** Keys: up, down, total. */
        public ?array $tunnels_metric = null,
        /** Public IP address */
        public ?string $public_ip = null,
        /** Mobility master hostname */
        public ?string $mm_hostname = null,
        /** Mobility master serial number */
        public ?string $mobility_master = null,
        /** Mobility conductor hostname */
        public ?string $mconductor_hostname = null,
        /** Mobility conductor serial number */
        public ?string $mobility_conductor = null,
        /** Name of the location */
        public ?string $sys_location = null,
        /** Name of the contact */
        public ?string $sys_contact = null,
    ) {}
}
