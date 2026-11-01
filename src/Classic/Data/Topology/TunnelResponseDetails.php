<?php

namespace spkm\ArubaCentral\Classic\Data\Topology;

use spkm\ArubaCentral\Data\Data;

/**
 * A TunnelResponseDetails record.
 */
readonly class TunnelResponseDetails extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $tunnels
     */
    public function __construct(
        /** A list of tunnel_full_schema records. */
        public ?array $tunnels = null,
        /** Status of the response. 200 = success, 400 = failure */
        public ?int $status_code = null,
    ) {}
}
