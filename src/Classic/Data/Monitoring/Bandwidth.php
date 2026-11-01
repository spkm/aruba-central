<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A Bandwidth record.
 */
readonly class Bandwidth extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Sample timestamp in epoch */
        public ?float $timestamp = null,
        /** RX data bytes for the timestamp */
        public ?float $rx_data_bytes = null,
        /** TX data bytes for the timestamp */
        public ?float $tx_data_bytes = null,
    ) {}
}
