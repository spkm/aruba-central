<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A Client record.
 */
readonly class Client extends Data
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
        /** Client OS type */
        public ?string $os_type = null,
        /** Client connection type */
        public ?string $connection = null,
        /** Client's associated AP/Switch serial */
        public ?string $associated_device = null,
        /** Encryption method used by client */
        public ?string $encryption_method = null,
        /** Client signal strength */
        public ?int $signal_strength = null,
        /** Client signal db */
        public ?int $signal_db = null,
        /** Client SNR */
        public ?int $snr = null,
        /** Client Speed */
        public ?int $speed = null,
        /** Total of received and transmitted data for last 5 mins. */
        public ?int $usage = null,
        /** Client health as computed by controller - a value between 0 to 100 */
        public ?int $health = null,
        /** Group name to which client belongs to */
        public ?string $group_name = null,
        /** Client's swarm ID */
        public ?string $swarm_id = null,
        /** Client's ESSID */
        public ?string $network = null,
        /** AP radio MAC address to which the client is associated */
        public ?string $radio_mac = null,
        /** Client device manufacturer */
        public ?string $manufacturer = null,
        /** Primary VLAN */
        public ?int $vlan = null,
        /** Client's list of labels */
        public ?array $labels = null,
        /** Client's site */
        public ?string $site = null,
        /** Connected device name */
        public ?string $associated_device_name = null,
    ) {}
}
