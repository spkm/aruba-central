<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A TopnInterfaceTrends record.
 */
readonly class TopnInterfaceTrends extends Data
{
    public function __construct(
        /** tenant id. */
        public ?string $id = null,
        /** Device type of monitoring. */
        public ?string $type = null,
        /** Serial number of switch */
        public ?string $serial = null,
        /** Site-id of the switch */
        public ?string $siteId = null,
        /** Hostname of the switch */
        public ?string $name = null,
        /** rxbytes of the switch */
        public ?int $rxBytes = null,
        /** txBytes of the switch */
        public ?int $txBytes = null,
    ) {}
}
