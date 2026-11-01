<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A SwitchStackVlanItem record.
 */
readonly class SwitchStackVlanItem extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $tagged_ports
     * @param  array<mixed>|null  $untagged_ports
     * @param  array<mixed>|null  $promiscuous_ports
     * @param  array<mixed>|null  $isl_ports
     */
    public function __construct(
        /** vlan name */
        public ?string $name = null,
        /** vlan id */
        public ?int $id = null,
        /** vlan tagged ports */
        public ?array $tagged_ports = null,
        /** vlan untagged ports */
        public ?array $untagged_ports = null,
        /** Status of the VLAN. Status can be Up/Down */
        public ?string $status = null,
        /** flag for igmp enabled */
        public ?bool $is_igmp_enabled = null,
        /** flag for jumbo enabled */
        public ?bool $is_jumbo_enabled = null,
        /** flag for voice enabled */
        public ?bool $is_voice_enabled = null,
        /** vlan promiscuous ports */
        public ?array $promiscuous_ports = null,
        /** vlan isl ports */
        public ?array $isl_ports = null,
        /** Primary VLAN Type One of: Regular, Private-Primary, Private-Isolated, Private-Community. */
        public ?string $type = null,
        /** Primary VLAN id */
        public ?int $primary_vlan_id = null,
    ) {}
}
