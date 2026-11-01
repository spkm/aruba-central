<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A Uplink record.
 */
readonly class Uplink extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $throughput
     * @param  array<mixed>|null  $usage
     */
    public function __construct(
        /** Uplink index within a device */
        public ?int $link_index = null,
        /** Uplink name */
        public ?string $name = null,
        /** Uplink description */
        public ?string $description = null,
        /** Uplink priority */
        public ?int $priority = null,
        /** Status is Up or Down */
        public ?string $status = null,
        /** WAN status is Up or Down */
        public ?string $wan_status = null,
        /** Primary VLAN. */
        public ?int $vlan = null,
        /** VLAN description */
        public ?string $vlan_description = null,
        /** Loss percentage */
        public ?int $loss = null,
        /** Latency in ms */
        public ?int $latency = null,
        /** Average MOS */
        public ?int $avg_mos = null,
        /** Default gateway IP */
        public ?string $default_gw = null,
        /** Backup uplink flag */
        public ?bool $is_backup = null,
        /** Virtual uplink flag */
        public ?bool $is_virtual_uplink = null,
        /** Link status */
        public ?string $link_status = null,
        /** Link tag */
        public ?string $link_tag = null,
        /** Private IP */
        public ?string $private_ip = null,
        /** Public IP */
        public ?string $public_ip = null,
        /** WAN type */
        public ?string $wan_type = null,
        /** received and sent throughput of the uplink in bytes Keys: received, sent. */
        public ?array $throughput = null,
        /** Keys: received, sent, total. */
        public ?array $usage = null,
    ) {}
}
