<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GatewayVlanItem record.
 */
readonly class GatewayVlanItem extends Data
{
    public function __construct(
        public ?int $vlanId = null,
        public ?string $name = null,
        public ?string $vlanType = null,
        public ?string $status = null,
        public ?string $adminStatus = null,
        public ?string $ipv4 = null,
        public ?string $ipv4Subnet = null,
        public ?string $ipv4MaskAddr = null,
        public ?string $interfaces = null,
        public ?string $id = null,
        public ?string $type = null,
    ) {}
}
