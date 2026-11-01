<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A TopNAp record.
 */
readonly class TopNAp extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** AP serial */
        public ?string $serial = null,
        /** AP name */
        public ?string $name = null,
        /** AP RX data bytes */
        public ?float $rx_data_bytes = null,
        /** AP TX data bytes */
        public ?float $tx_data_bytes = null,
    ) {}
}
