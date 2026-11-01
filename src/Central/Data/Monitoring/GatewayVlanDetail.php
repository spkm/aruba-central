<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GatewayVlanDetail record.
 */
readonly class GatewayVlanDetail extends Data
{
    public function __construct(
        /** The VLAN ID configured in the gateway. */
        public ?int $vlanId = null,
        public ?string $name = null,
        /** The type of VLAN configured in the gateway, either Static or Dynamic. One of: Static, Dynamic. */
        public ?string $vlanType = null,
        /** The status of the VLAN configured in the gateway. One of: Up, Down. */
        public ?string $status = null,
        /** The admin status of the VLAN. One of: Up, Down. */
        public ?string $adminStatus = null,
        /** IP address of the VLAN. */
        public ?string $ipv4 = null,
        /** IP address of the VLAN's subnet. */
        public ?string $ipv4Subnet = null,
        /** The masked IP address of the VLAN. */
        public ?string $ipv4MaskAddr = null,
        /** The interface to which the VLAN is assigned. */
        public ?string $interfaces = null,
        /** The voice traffic of the VLAN. */
        public ?string $voice = null,
        /** The prefix of the IPv6 address. */
        public ?string $ipv6Prefix = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
