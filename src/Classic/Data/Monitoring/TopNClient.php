<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A TopNClient record.
 */
readonly class TopNClient extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Client MAC address */
        public ?string $macaddr = null,
        /** Client name */
        public ?string $name = null,
        /** Client RX data bytes */
        public ?float $rx_data_bytes = null,
        /** Client TX data bytes */
        public ?float $tx_data_bytes = null,
    ) {}
}
