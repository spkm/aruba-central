<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A DeviceNeighborsRootItem record.
 */
readonly class DeviceNeighborsRootItem extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $ec_str
     * @param  array<mixed>|null  $sc_str
     */
    public function __construct(
        /** The string value used to identify the chassis component associated with the system. */
        public ?string $chassis_id = null,
        /** The type of encoding used to identify the chassis associated with the system. */
        public ?float $chassis_id_type = null,
        /** description of the remote device */
        public ?string $desc = null,
        /** enabled capabilities */
        public ?array $ec_str = null,
        /** ip address of the remote device */
        public ?string $ip = null,
        /** Power allocated to lldp port in watts */
        public ?float $lldp_allocated_power = null,
        /** Power requested by lldp port in watts */
        public ?float $lldp_requested_power = null,
        /** name of the remote device */
        public ?string $name = null,
        /** name of port to which neighbour is connected */
        public ?string $port = null,
        /** neighbour device serial */
        public ?string $remote_device = null,
        /** mac address of the port */
        public ?string $remote_device_mac = null,
        /** description of the port */
        public ?string $remote_port = null,
        /** description of the port */
        public ?string $remote_port_number = null,
        /** supported capabilities */
        public ?array $sc_str = null,
        /** vlan id */
        public ?string $vlan_id = null,
    ) {}
}
