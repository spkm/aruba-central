<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A AccessPointWlanInfoWithClientCount record.
 */
readonly class AccessPointWlanInfoWithClientCount extends Data
{
    public function __construct(
        public ?string $wlanName = null,
        public ?string $securityLevel = null,
        public ?string $security = null,
        public ?string $band = null,
        public ?string $status = null,
        public ?string $vlan = null,
        public ?int $clientCount = null,
        public ?string $forwardMode = null,
        public ?string $id = null,
        public ?string $type = null,
    ) {}
}
