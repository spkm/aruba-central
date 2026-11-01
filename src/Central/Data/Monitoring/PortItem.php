<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A PortItem record.
 */
readonly class PortItem extends Data
{
    public function __construct(
        public ?string $macAddress = null,
        public ?string $name = null,
        public ?string $status = null,
        public ?string $vlanMode = null,
        public ?string $allowedVlan = null,
        public ?string $nativeVlan = null,
        public ?string $accessVlan = null,
        public ?string $speed = null,
        public ?string $duplex = null,
        public ?string $connector = null,
        public ?bool $isUplink = null,
        public ?int $portIndex = null,
        public ?string $id = null,
        public ?string $type = null,
    ) {}
}
