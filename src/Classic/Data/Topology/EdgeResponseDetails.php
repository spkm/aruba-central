<?php

namespace spkm\ArubaCentral\Classic\Data\Topology;

use spkm\ArubaCentral\Data\Data;

/**
 * A EdgeResponseDetails record.
 */
readonly class EdgeResponseDetails extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $edges
     */
    public function __construct(
        /** Status code. 200 = success, 400 = failure */
        public ?int $status_code = null,
        /** A list of edge_schema records. */
        public ?array $edges = null,
    ) {}
}
