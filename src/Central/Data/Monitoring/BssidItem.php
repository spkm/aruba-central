<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A BssidItem record.
 */
readonly class BssidItem extends Data
{
    public function __construct(
        public ?string $serialNumber = null,
        public ?string $deviceName = null,
        public ?string $macAddress = null,
        public ?string $clusterId = null,
        public ?int $radioNumber = null,
        public ?string $radioMacAddress = null,
        public ?string $bssid = null,
        public ?string $wlanName = null,
        public ?string $siteId = null,
        public ?string $siteName = null,
        public ?int $clientcount = null,
        public ?string $id = null,
        public ?string $type = null,
    ) {}
}
