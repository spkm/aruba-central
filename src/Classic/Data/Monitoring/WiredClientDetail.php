<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A WiredClientDetail record.
 */
readonly class WiredClientDetail extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $labels
     */
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
        /** Client's user role */
        public ?string $user_role = null,
        /** Client's list of labels */
        public ?array $labels = null,
        /** Client's site */
        public ?string $site = null,
        /** Client's last connection time */
        public ?int $last_connection_time = null,
        /** Device Interface MAC address to which the client is associated */
        public ?string $interface_mac = null,
        /** Client device manufacturer */
        public ?string $manufacturer = null,
        /** Client device or OS type */
        public ?string $device_type = null,
        /** Primary VLAN */
        public ?int $vlan = null,
        /** Client authentication type */
        public ?string $authentication_type = null,
    ) {}
}
