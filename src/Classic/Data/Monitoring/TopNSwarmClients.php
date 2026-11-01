<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A TopNSwarmClients record.
 */
readonly class TopNSwarmClients extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Swarm ID */
        public ?string $id = null,
        /** Swarm Name */
        public ?string $name = null,
        /** Number of clients per swarm */
        public ?float $clients_count = null,
    ) {}
}
