<?php

namespace spkm\ArubaCentral\Classic\Data\Routing;

use spkm\ArubaCentral\Data\Data;

/**
 * A NbrRouteRespItem record.
 */
readonly class NbrRouteRespItem extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $nexthop
     */
    public function __construct(
        /** Route prefix */
        public ?string $prefix = null,
        /** Route subnetmask length */
        public ?int $length = null,
        /** Nexthop using which this route is reachable */
        public ?array $nexthop = null,
    ) {}
}
