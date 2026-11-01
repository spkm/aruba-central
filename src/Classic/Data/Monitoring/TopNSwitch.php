<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A TopNSwitch record.
 */
readonly class TopNSwitch extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Switch serial */
        public ?string $serial = null,
        /** Switch name */
        public ?string $name = null,
        /** Switch RX data bytes */
        public ?float $rx_data_bytes = null,
        /** Switch TX data bytes */
        public ?float $tx_data_bytes = null,
    ) {}
}
