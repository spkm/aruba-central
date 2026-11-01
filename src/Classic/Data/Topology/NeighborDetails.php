<?php

namespace spkm\ArubaCentral\Classic\Data\Topology;

use spkm\ArubaCentral\Data\Data;

/**
 * A NeighborDetails record.
 */
readonly class NeighborDetails extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $neighbors
     */
    public function __construct(
        /** A list of neighbor_schema records. */
        public ?array $neighbors = null,
        /** Status of the response. 200 = success, 400 = failure */
        public ?int $status_code = null,
    ) {}
}
