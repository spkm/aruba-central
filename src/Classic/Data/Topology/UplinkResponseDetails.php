<?php

namespace spkm\ArubaCentral\Classic\Data\Topology;

use spkm\ArubaCentral\Data\Data;

/**
 * A UplinkResponseDetails record.
 */
readonly class UplinkResponseDetails extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $uplinks
     */
    public function __construct(
        /** Status code. 200 = success, 400 = failure */
        public ?int $status_code = null,
        /** A list of uplink_edge_schema records. */
        public ?array $uplinks = null,
    ) {}
}
