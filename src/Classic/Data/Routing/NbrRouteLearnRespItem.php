<?php

namespace spkm\ArubaCentral\Classic\Data\Routing;

use spkm\ArubaCentral\Data\Data;

/**
 * A NbrRouteLearnRespItem record.
 */
readonly class NbrRouteLearnRespItem extends Data
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
