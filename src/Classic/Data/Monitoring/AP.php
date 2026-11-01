<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A AP record.
 */
readonly class AP extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $labels
     * @param  array<mixed>|null  $radios
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
        /** Clients connected to AP. Valid only when calculate_client_count is specified */
        public ?int $client_count = null,
        /** SSIDs supported by this AP. Valid only when calculate_ssid_count is specified */
        public ?int $ssid_count = null,
        /** list labels assigned to AP */
        public ?array $labels = null,
        /** site assigned to AP */
        public ?string $site = null,
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
        /** Gateway cluster ID */
        public ?int $gateway_cluster_id = null,
        /** Gateway cluster name */
        public ?string $gateway_cluster_name = null,
        /** List of AP radios */
        public ?array $radios = null,
        /** Public Ip address of the AP */
        public ?string $public_ip_address = null,
        /** IP Subnet mask */
        public ?string $subnet_mask = null,
        /** AP mesh role */
        public ?string $mesh_role = null,
        /** Serial number of the secondary controller */
        public ?string $secondary_controller_serial = null,
        /** Hostname of the secondary controller */
        public ?string $secondary_controller_hostname = null,
        /** Notes of an AP */
        public ?string $notes = null,
        /** Name of the swarm to which AP belongs */
        public ?string $swarm_name = null,
        /** Name of the controller to which AP belongs */
        public ?string $controller_name = null,
    ) {}
}
