<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A SWPortDetail record.
 */
readonly class SWPortDetail extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $allowed_vlan
     */
    public function __construct(
        /** Switch Port Number */
        public ?string $port_number = null,
        /** Switch Port Status */
        public ?string $status = null,
        /** Switch Port type */
        public ?string $type = null,
        /** Mode in which Port is operating */
        public ?string $mode = null,
        /** Primary VLAN. */
        public ?int $vlan = null,
        /** Port Tx Usage */
        public ?float $tx_usage = null,
        /** Port Rx Usage */
        public ?float $rx_usage = null,
        /** POE Support is present */
        public ?bool $has_poe = null,
        /** POE State of the port */
        public ?string $poe_state = null,
        /** Operational State of the port */
        public ?string $oper_state = null,
        /** Admin State of the port */
        public ?string $admin_state = null,
        /** Port Speed Type */
        public ?string $speed = null,
        /** Mux Support is enabled */
        public ?bool $mux = null,
        /** Trusted Port */
        public ?bool $trusted = null,
        /** Power consumed by the port */
        public ?int $power_consumption = null,
        /** Allowed VLAN. */
        public ?array $allowed_vlan = null,
        /** Module/slot of the port. */
        public ?string $slot = null,
        /** Alignment of the port. */
        public ?string $alignment = null,
        /** If the port is internal/external. */
        public ?string $internal = null,
        /** Type of interface. */
        public ?string $phy_type = null,
        /** Sub-type of interface. */
        public ?string $sub_type = null,
        /** Duplex mode. */
        public ?string $duplex_mode = null,
        /** Port MAC address. */
        public ?string $macaddr = null,
        /** if port is uplink port */
        public ?bool $is_uplink = null,
        /** port number */
        public ?string $port = null,
        /** out errors count */
        public ?int $out_errors = null,
        /** in errors count */
        public ?int $in_errors = null,
    ) {}
}
