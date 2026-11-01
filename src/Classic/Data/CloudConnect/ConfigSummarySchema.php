<?php

namespace spkm\ArubaCentral\Classic\Data\CloudConnect;

use spkm\ArubaCentral\Data\Data;

/**
 * A ConfigSummarySchema record.
 */
readonly class ConfigSummarySchema extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $branch_topologies
     */
    public function __construct(
        public ?array $branch_topologies = null,
        public ?float $branch_topology_count = null,
    ) {}
}
