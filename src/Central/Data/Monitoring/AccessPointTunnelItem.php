<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A AccessPointTunnelItem record.
 */
readonly class AccessPointTunnelItem extends Data
{
    public function __construct(
        public ?string $tunnelName = null,
        public ?string $index = null,
        public ?string $destinationName = null,
        public ?string $destinationMacAddress = null,
        public ?string $destinationIpAddress = null,
        public ?string $status = null,
        public ?string $encapsulationType = null,
        public ?string $cryptoType = null,
        public ?string $sourceIpAddress = null,
        public ?string $lastChangeReason = null,
        public ?int $uptimeInMillis = null,
        public ?bool $active = null,
        public ?string $tunnelId = null,
        public ?string $id = null,
        public ?string $type = null,
    ) {}
}
