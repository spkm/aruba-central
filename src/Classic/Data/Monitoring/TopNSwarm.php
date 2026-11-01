<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A TopNSwarm record.
 */
readonly class TopNSwarm extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Swarm ID */
        public ?string $id = null,
        /** Swarm Name */
        public ?string $name = null,
        /** Swarm RX data bytes */
        public ?float $rx_data_bytes = null,
        /** Swarm TX data bytes */
        public ?float $tx_data_bytes = null,
    ) {}
}
