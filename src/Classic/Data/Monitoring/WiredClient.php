<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A WiredClient record.
 */
readonly class WiredClient extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Client MAC address */
        public ?string $macaddr = null,
        /** Client name */
        public ?string $name = null,
        /** Client IP address */
        public ?string $ip_address = null,
        /** Client's username */
        public ?string $username = null,
        /** Client's associated AP/Switch serial */
        public ?string $associated_device = null,
        /** Group name to which client belongs to */
        public ?string $group_name = null,
        /** Device Interface MAC address to which the client is associated */
        public ?string $interface_mac = null,
        /** Device Interface port to which the client is associated */
        public ?string $interface_port = null,
        /** Primary VLAN */
        public ?int $vlan = null,
        /** Connected device name */
        public ?string $associated_device_name = null,
    ) {}
}
