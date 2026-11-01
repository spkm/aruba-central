<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GatewayVLANInfoItem record.
 */
readonly class GatewayVLANInfoItem extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Addressing mode */
        public ?string $addr_mode = null,
        /** Administrator mode */
        public ?string $admin_mode = null,
        /** IPv4 address */
        public ?string $ipv4 = null,
        /** Operational State */
        public ?string $oper_state = null,
        /** VLAN description */
        public ?string $vlan_desc = null,
        /** Vlan id */
        public ?int $vlan_id = null,
    ) {}
}
