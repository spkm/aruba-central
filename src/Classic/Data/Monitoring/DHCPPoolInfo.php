<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A DHCPPoolInfo record.
 */
readonly class DHCPPoolInfo extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Subnet of the pool */
        public ?string $subnet = null,
        /** VLAN id associated to the pool */
        public ?int $vlan_id = null,
        /** Lease time configured */
        public ?int $lease_time = null,
        /** DHCP Pool Name configured */
        public ?string $pool_name = null,
        /** Pool type */
        public ?int $pool_type = null,
        /** DHCP Pool Size */
        public ?int $pool_size = null,
        /** Pool current leases */
        public ?int $curr_leases = null,
        /** Percent of free ip addresses */
        public ?float $free_ip_addr_percent = null,
    ) {}
}
