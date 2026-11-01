<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A StackDetail record.
 */
readonly class StackDetail extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Switch stack_id */
        public ?string $id = null,
        /** Stack status Up or Down */
        public ?string $status = null,
        /** topology of the stack */
        public ?string $topology = null,
        /** split policy string */
        public ?string $split_policy = null,
        /** Group Name to which the Stack belongs to */
        public ?string $group = null,
        /** Stack MAC address */
        public ?string $mac = null,
        /** Public Ip address of the Stack */
        public ?string $public_ip_address = null,
        /** location of the stack */
        public ?string $location = null,
        /** Stack hostname */
        public ?string $name = null,
        /** Domain ID of VSF stack */
        public ?int $domain_id = null,
        /** Type of the switch.For CX Switches type is ArubaCX where as for PVOS switches type is ArubaSwitch. MAAS stands for Aruba MAS Switches. One of: ArubaCX, ArubaSwitch, MAAS. */
        public ?string $switch_type = null,
    ) {}
}
