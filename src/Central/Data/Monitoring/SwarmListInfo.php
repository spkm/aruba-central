<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A SwarmListInfo record.
 */
readonly class SwarmListInfo extends Data
{
    public function __construct(
        public ?string $clusterId = null,
        public ?string $clusterName = null,
        public ?string $siteId = null,
        public ?string $siteName = null,
        public ?string $conductorDeviceName = null,
        public ?string $conductorSerialNumber = null,
        public ?string $ipv4 = null,
        public ?string $ipv6 = null,
        public ?string $firmwareVersion = null,
        public ?string $publicIpAddress = null,
        public ?string $id = null,
        public ?string $type = null,
    ) {}
}
