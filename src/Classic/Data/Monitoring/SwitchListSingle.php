<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A SwitchListSingle record.
 */
readonly class SwitchListSingle extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $labels
     * @param  array<mixed>|null  $uplink_ports
     */
    public function __construct(
        /** Firmware version of the switch */
        public ?string $firmware_version = null,
        /** Group name of the switch */
        public ?string $group_name = null,
        /** Label names of the switch */
        public ?array $labels = null,
        /** IP Address of the switch */
        public ?string $ip_address = null,
        /** Mac Address of the switch */
        public ?string $macaddr = null,
        /** Model of the switch */
        public ?string $model = null,
        /** hostname of the switch */
        public ?string $name = null,
        /** Public IP address of the switch */
        public ?string $public_ip_address = null,
        /** serial number of the switch */
        public ?string $serial = null,
        /** site name of the switch */
        public ?string $site = null,
        /** Status of the switch (Up/Down) One of: Up, Down. */
        public ?string $status = null,
        /** uplink ports of the switch */
        public ?array $uplink_ports = null,
        /** Switch usage */
        public ?int $usage = null,
        /** stack_id if device id is member of Stack else null */
        public ?string $stack_id = null,
        /** type of switch, AOS-S or AOS-CX */
        public ?string $switch_type = null,
    ) {}
}
