<?php

namespace spkm\ArubaCentral\Classic\Data\Routing;

use spkm\ArubaCentral\Data\Data;

/**
 * A RecvRouteRespItem record.
 */
readonly class RecvRouteRespItem extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $nexthop
     */
    public function __construct(
        /** Network address */
        public ?string $prefix = null,
        /** Network length */
        public ?int $length = null,
        /** Time at which the route is learned */
        public ?int $learn_time = null,
        /** Overlay Network Segment */
        public ?string $segment = null,
        public ?array $nexthop = null,
    ) {}
}
