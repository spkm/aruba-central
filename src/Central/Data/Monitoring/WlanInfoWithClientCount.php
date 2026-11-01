<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A WlanInfoWithClientCount record.
 */
readonly class WlanInfoWithClientCount extends Data
{
    public function __construct(
        public ?string $wlanName = null,
        public ?string $securityLevel = null,
        public ?string $security = null,
        public ?string $band = null,
        public ?string $status = null,
        public ?string $vlan = null,
        public ?int $clientCount = null,
        public ?string $id = null,
        public ?string $type = null,
    ) {}
}
