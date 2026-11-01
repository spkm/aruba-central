<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A APDetail record.
 */
readonly class APDetail extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $radios
     * @param  array<mixed>|null  $ethernets
     */
    public function __construct(
        /** AP serial number */
        public ?string $serial = null,
        /** AP Name */
        public ?string $name = null,
        /** AP MAC address */
        public ?string $macaddr = null,
        /** Swarm ID to which AP belongs to */
        public ?string $swarm_id = null,
        /** Group name to which AP belongs to */
        public ?string $group_name = null,
        /** AP group name to which AP belongs to */
        public ?string $ap_group = null,
        /** SerialNo of the controller the AP belongs to */
        public ?string $cluster_id = null,
        /** Deployment mode of the AP */
        public ?string $ap_deployment_mode = null,
        /** Status is Up or Down */
        public ?string $status = null,
        /** AP IP address */
        public ?string $ip_address = null,
        /** AP model number */
        public ?string $model = null,
        /** AP firmware version */
        public ?string $firmware_version = null,
        /** Whether AP is the swarm master */
        public ?bool $swarm_master = null,
        /** Current AP CPU utilization */
        public ?int $cpu_utilization = null,
        /** AP uptime in seconds */
        public ?int $uptime = null,
        /** Reason for Down AP */
        public ?string $down_reason = null,
        /** AP last modified time */
        public ?int $last_modified = null,
        /** AP total memory */
        public ?int $mem_total = null,
        /** AP free memory */
        public ?int $mem_free = null,
        /** AP mesh role */
        public ?string $mesh_role = null,
        /** AP operating mode */
        public ?string $mode = null,
        /** List of AP radios A list of RadioDetail records. */
        public ?array $radios = null,
        /** Clients connected to AP */
        public ?int $client_count = null,
        /** SSIDs supported by this AP */
        public ?int $ssid_count = null,
        /** List of Ethernets A list of EthernetDetail records. */
        public ?array $ethernets = null,
        /** True if modem is plugged in, False if modem is not plugged-in/not supported. */
        public ?bool $modem_connected = null,
        /** Uplink type in use by this AP. */
        public ?string $current_uplink_inuse = null,
        /** Public Ip address of the AP */
        public ?string $public_ip_address = null,
        /** Ip address of the AP in ip v6 format */
        public ?string $ip_address_v6 = null,
        /** IP Subnet mask */
        public ?string $subnet_mask = null,
        /** Name of the site of AP */
        public ?string $site_name = null,
        /** Name of the swarm the AP belongs to */
        public ?string $swarm_name = null,
        /** Name of the controller the AP belongs to */
        public ?string $controller_name = null,
        /** System location as provided in the controller. Not applicable for IAPs */
        public ?string $sys_location = null,
        /** System contact as provided in the controller. Not applicable for IAPs */
        public ?string $sys_contact = null,
    ) {}
}
