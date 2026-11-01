<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A UnifiedClient record.
 */
readonly class UnifiedClient extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $labels
     * @param  array<mixed>|null  $label_id
     */
    public function __construct(
        /** Client MAC address */
        public ?string $macaddr = null,
        /** Client type wired or wireless */
        public ?string $client_type = null,
        /** Client name */
        public ?string $name = null,
        /** Client IP address */
        public ?string $ip_address = null,
        /** Client IP V6 address */
        public ?string $ip_v6_address = null,
        /** Client Failure reason */
        public ?string $failure_reason = null,
        /** Client Failure stage */
        public ?string $failure_stage = null,
        /** Client's username */
        public ?string $username = null,
        /** Client's user role */
        public ?string $user_role = null,
        /** Client OS type */
        public ?string $os_type = null,
        /** Client Family type */
        public ?string $client_family = null,
        /** Client Category type */
        public ?string $client_category = null,
        /** Client connection type */
        public ?string $connection = null,
        /** Client's associated AP/Switch/Gateway serial */
        public ?string $associated_device = null,
        /** Client's associated AP/Switch/Gateway mac */
        public ?string $associated_device_mac = null,
        /** connected device type AP/SWITCH/GATEWAY */
        public ?string $connected_device_Type = null,
        /** Encryption method used by client */
        public ?string $encryption_method = null,
        /** Client signal strength. Valid when show_signal_db is passed as true in query parameters. */
        public ?int $signal_strength = null,
        /** Client signal db. Valid when show_signal_db is passed as true in query parameters. */
        public ?int $signal_db = null,
        /** Client SNR */
        public ?int $snr = null,
        /** Client Speed */
        public ?int $speed = null,
        /** Client maximum speed */
        public ?int $maxspeed = null,
        /** Total of received and transmitted data for last 3 hours by default. Providing timerange, will fetch usage for that timerange. Valid when show_usage is passed… */
        public ?int $usage = null,
        /** Client health as computed by controller - a value between 0 to 100 */
        public ?int $health = null,
        /** Group name to which client belongs to */
        public ?string $group_name = null,
        /** Group id to which client belongs to */
        public ?int $group_id = null,
        /** Client's swarm ID */
        public ?string $swarm_id = null,
        /** Client's ESSID */
        public ?string $network = null,
        /** AP radio MAC address to which the client is associated */
        public ?string $radio_mac = null,
        /** AP radio number to which the client is associated */
        public ?int $radio_number = null,
        /** Client device manufacturer. Valid when show_manufacturer is passed as true in query parameters. */
        public ?string $manufacturer = null,
        /** Client bssid */
        public ?string $bssid = null,
        /** Primary VLAN */
        public ?int $vlan = null,
        /** Client's list of labels */
        public ?array $labels = null,
        /** Client's list of label ids */
        public ?array $label_id = null,
        /** Client's site */
        public ?string $site = null,
        /** Device Interface MAC address to which the client is associated */
        public ?string $interface_mac = null,
        /** Device Interface port to which the client is associated */
        public ?string $interface_port = null,
        /** Client authentication type */
        public ?string $authentication_type = null,
        /** Wireless Client radio band */
        public ?string $band = null,
        /** Connected device name */
        public ?string $associated_device_name = null,
    ) {}
}
