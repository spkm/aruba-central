<?php

namespace spkm\ArubaCentral\Classic\Data\DeviceReplacement;

use spkm\ArubaCentral\Data\Data;

/**
 * A OfflineDevicesItem record.
 */
readonly class OfflineDevicesItem extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $gps
     * @param  array<mixed>|null  $labels
     * @param  array<mixed>|null  $radios
     */
    public function __construct(
        /** Deployment mode of the AP */
        public ?string $ap_deployment_mode = null,
        /** AP group name to which AP belongs to */
        public ?string $ap_group = null,
        /** SerialNo of the controller the AP belongs to */
        public ?string $cluster_id = null,
        /** Name of the controller the AP belongs to */
        public ?string $controller_name = null,
        /** Reason for Down AP */
        public ?string $down_reason = null,
        /** Firmware version of AP */
        public ?string $firmware_version = null,
        /** gateway cluster id */
        public ?string $gateway_cluster_id = null,
        /** gateway cluster name */
        public ?string $gateway_cluster_name = null,
        public ?array $gps = null,
        /** Group id */
        public ?int $group_id = null,
        /** Group name */
        public ?string $group_name = null,
        /** Ip address */
        public ?string $ip_address = null,
        /** Labels */
        public ?array $labels = null,
        /** Last modified time */
        public ?int $last_modified = null,
        /** AP MAC address */
        public ?string $macaddr = null,
        /** AP mesh role */
        public ?string $mesh_role = null,
        /** AP model number */
        public ?string $model = null,
        /** AP name */
        public ?string $name = null,
        /** AP notes */
        public ?string $notes = null,
        /** AP persona */
        public ?string $persona = null,
        /** public ip address */
        public ?string $public_ip_address = null,
        /** List of AP radios */
        public ?array $radios = null,
        /** AP serial */
        public ?string $serial = null,
        /** AP site */
        public ?string $site = null,
        /** Site ID */
        public ?string $site_id = null,
        /** AP sleep status */
        public ?string $sleep_status = null,
        /** Status is Up or Down */
        public ?string $status = null,
        /** Subnet mask address */
        public ?string $subnet_mask = null,
        /** AP swarm ID */
        public ?string $swarm_id = null,
        /** Whether AP is the swarm master */
        public ?string $swarm_master = null,
        /** Name of the swarm the AP belongs to */
        public ?string $swarm_name = null,
    ) {}
}
