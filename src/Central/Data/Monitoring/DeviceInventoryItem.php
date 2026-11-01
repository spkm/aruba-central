<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A DeviceInventoryItem record.
 */
readonly class DeviceInventoryItem extends Data
{
    public function __construct(
        public ?string $model = null,
        public ?string $serialNumber = null,
        public ?string $deviceType = null,
        public ?string $role = null,
        public ?string $siteId = null,
        public ?string $deviceFunction = null,
        public ?string $deviceGroupId = null,
        public ?string $scopeId = null,
        public ?string $siteName = null,
        public ?string $deviceGroupName = null,
        public ?string $firmwareVersion = null,
        public ?string $isProvisioned = null,
        public ?string $deviceName = null,
        public mixed $tier = null,
        public ?string $subscriptionKey = null,
        public ?string $stackId = null,
        public ?string $type = null,
        public ?string $macAddress = null,
        public ?string $ipv4 = null,
        public ?string $id = null,
        public ?string $deployment = null,
        public ?string $status = null,
        public ?string $partNumber = null,
    ) {}
}
