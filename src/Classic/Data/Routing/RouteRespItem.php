<?php

namespace spkm\ArubaCentral\Classic\Data\Routing;

use spkm\ArubaCentral\Data\Data;

/**
 * A RouteRespItem record.
 */
readonly class RouteRespItem extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $nexthop
     */
    public function __construct(
        public ?string $prefix = null,
        public ?int $length = null,
        public ?array $nexthop = null,
    ) {}
}
