<?php

namespace spkm\ArubaCentral\Classic\Data\Routing;

use spkm\ArubaCentral\Data\Data;

/**
 * A AreaRespItem record.
 */
readonly class AreaRespItem extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $area_id = null,
        /** Type of area > * Normal - Normal (Normal area) * Stub - Stub (Stub area) * NSSA - NSSA (Not-So-Stubby area) One of: Normal, Stub, NSSA. */
        public ?string $area_type = null,
        public ?int $interface_count = null,
        public ?int $spf_run_count = null,
        public ?int $default_cost = null,
        public ?bool $summary_enable = null,
    ) {}
}
