<?php

namespace spkm\ArubaCentral\Classic\Data\Routing;

use spkm\ArubaCentral\Data\Data;

/**
 * A ConnRespItem record.
 */
readonly class ConnRespItem extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Control Plane Peer */
        public ?string $peer = null,
        /** Overlay channel state One of: OAP_CHANNEL_INIT, OAP_CHANNEL_CONNECTING, OAP_CHANNEL_CONNECTED, OAP_CHANNEL_DISCONNECT. */
        public ?string $state = null,
        /** Elapsed time in seconds since connection state has changed */
        public ?int $last_state_change = null,
        /** Number of times overlay connection went down */
        public ?int $down_count = null,
        /** Number of routes advertised to overlay */
        public ?int $advertised_routes = null,
        /** Number of routes learned from overlay */
        public ?int $learned_routes = null,
    ) {}
}
