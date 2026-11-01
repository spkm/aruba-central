<?php

namespace spkm\ArubaCentral\Classic\Data\Routing;

use spkm\ArubaCentral\Data\Data;

/**
 * A NeighborRespItem record.
 */
readonly class NeighborRespItem extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $router_id = null,
        public ?int $asn = null,
        /** One of: IDLE, CONNECT, ACTIVE, OPENCONFIRM, OPENSENT, ESTABLISHED, CLOSE, PASSIVE, DOWN. */
        public ?string $state = null,
        public ?string $address = null,
        public ?string $source_address = null,
        public ?string $nexthop_address = null,
        public ?string $link_address = null,
        public ?int $hold_time = null,
        public ?int $cfg_hold_time = null,
        public ?int $keep_alive_time = null,
        public ?int $cfg_keep_alive_time = null,
        public ?bool $is_ibgp = null,
        public ?bool $is_route_reflector = null,
        public ?bool $is_route_server = null,
        public ?bool $cap_route_refresh = null,
        public ?bool $cap_graceful_restart = null,
        public ?bool $cap_additional_path_comp = null,
        public ?bool $local_cap_route_refresh = null,
        public ?bool $local_cap_graceful_restart = null,
        public ?bool $local_cap_additional_path_comp = null,
        public ?int $version = null,
        public ?int $tos = null,
        public ?int $mss = null,
        public ?int $down_count = null,
        public ?int $up_count = null,
        public ?int $up_time = null,
        public ?int $last_state_change = null,
        public ?int $recv_path_count = null,
        public ?int $sent_path_count = null,
        public ?int $graceful_restart_time = null,
        public ?int $local_graceful_restart_time = null,
        /** MD5 authenticaton authentication enabled/disabled */
        public ?bool $md5_auth = null,
        public ?int $recv_path_limit = null,
        /** One of: None, Warn, Drop. */
        public ?string $recv_path_limit_action = null,
        public ?string $neighbor_id = null,
        public ?int $priority = null,
        public ?string $interface_addr = null,
        public ?string $interface_name = null,
        /** Interface state > * DOWN - Down (Interface is down) * LOOP - Loopback (Interface is in loopback) * WAIT - Waiting (Waiting to determine the identity of DR/BDR)… One of: DOWN, LOOP, WAIT, PTPST, DR, BACKUP, DROTHER. */
        public ?string $interface_state = null,
        /** Neighbor state > * NBRDOWN - Down (Neighbor is down) * ATTEMPT - Attempt (Attempting to contact neighbor) * INIT - Init (Received hello from this neighbor) *… One of: NBRDOWN, ATTEMPT, INIT, TWOWAY, EXSTART, EXCHANGE, LOADING, FULL. */
        public ?string $neighbor_state = null,
        public ?string $area_id = null,
        public ?int $options = null,
        public ?int $dead_timer = null,
        public ?int $rexmt_timer = null,
        /** Cost associated to reach the neighbor */
        public ?int $metric = null,
        /** Number of routes learned from this neighbor */
        public ?int $routes = null,
        /** Number of seconds elapsed since a neighbor message is received */
        public ?int $last_seen = null,
    ) {}
}
