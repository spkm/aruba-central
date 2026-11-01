<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GwVpnAvailTrend record.
 */
readonly class GwVpnAvailTrend extends Data
{
    /**
     * @param  array<mixed>|null  $graph
     */
    public function __construct(
        /** Metric for the VPN availability trends of gateway. */
        public ?string $metric = null,
        /** Keys: keys, samples. */
        public ?array $graph = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
    ) {}
}
