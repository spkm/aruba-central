<?php

namespace spkm\ArubaCentral\Classic\Data\Routing;

use spkm\ArubaCentral\Data\Data;

/**
 * A InterfaceRespItem record.
 */
readonly class InterfaceRespItem extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $config
     */
    public function __construct(
        public ?string $name = null,
        public ?string $area_id = null,
        public ?string $address = null,
        public ?string $mask = null,
        /** Interface state > * DOWN - Down (Interface is down) * LOOP - Loopback (Interface is in loopback) * WAIT - Waiting (Waiting to determine the identity of DR/BDR)… One of: DOWN, LOOP, WAIT, PTPST, DR, BACKUP, DROTHER. */
        public ?string $state = null,
        /** Interface type > * BCAST - Broadcast (Broadcast interface) * NBMA - NBMA (Non Broadcast Multi Access interface) * PTP - P2P (Point-to-Point interface) * VRTL -… One of: BCAST, NBMA, PTP, VRTL, PTM, LOOPBACK. */
        public ?string $type = null,
        public ?int $cost = null,
        public ?int $neighbor_count = null,
        public ?string $dr_id = null,
        public ?string $dr_address = null,
        public ?string $bdr_id = null,
        public ?string $bdr_address = null,
        public ?int $priority = null,
        public ?int $hello_interval = null,
        public ?int $dead_interval = null,
        public ?int $rexmt_interval = null,
        public ?string $auth_type = null,
        /** Device at the other end of the overlay interface/tunnel */
        public ?string $endpoint = null,
        /** Elapsed time in seconds since the interface is UP */
        public ?int $uptime = null,
        /** Number of routes for which interface/tunnel endpoint is the nexthop */
        public ?int $num_routes = null,
        /** Uplink VLAN Identifier */
        public ?int $vlan = null,
        /** Cost associated with the interface */
        public ?int $metric = null,
        /** Next RIP update to be sent on this interface (1d 3h 40m 20s) */
        public ?int $next_update = null,
        public ?array $config = null,
    ) {}
}
