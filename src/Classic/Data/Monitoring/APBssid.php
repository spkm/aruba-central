<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A APBssid record.
 */
readonly class APBssid extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $radio_bssids
     */
    public function __construct(
        /** AP serial number */
        public ?string $serial = null,
        /** AP Name */
        public ?string $name = null,
        /** AP MAC address */
        public ?string $macaddr = null,
        /** Swarm ID to which AP belongs to */
        public ?string $swarm_id = null,
        /** List of BSSIDs */
        public ?array $radio_bssids = null,
    ) {}
}
