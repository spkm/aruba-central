<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A DHCPClientInfo record.
 */
readonly class DHCPClientInfo extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Client hostname */
        public ?string $client_name = null,
        /** Client device type */
        public ?string $client_type = null,
        /** IP address of the client */
        public ?string $ip = null,
        /** Lease end timestamp for the client */
        public ?int $lease_end_ts = null,
        /** Lease start timestamp for the client */
        public ?int $lease_start_ts = null,
        /** Lease time configured for the client */
        public ?int $lease_time = null,
        /** Lease time remaining for the client */
        public ?int $lease_time_left = null,
        /** MAC address of the client */
        public ?string $mac = null,
        /** Network mask of the client */
        public ?string $mask = null,
        /** Name of the DHCP pool that client belongs to */
        public ?string $pool_name = null,
        /** Flag to denote static leases */
        public ?bool $reserved = null,
        /** Subnet the client is in the network */
        public ?string $subnet = null,
        /** VLAN associated to the client */
        public ?int $vlan_id = null,
    ) {}
}
