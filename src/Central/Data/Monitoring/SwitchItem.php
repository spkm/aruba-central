<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A SwitchItem record.
 */
readonly class SwitchItem extends Data
{
    /**
     * @param  array<mixed>|null  $switchTrends
     */
    public function __construct(
        public ?string $firmwareVersion = null,
        public ?string $ipv4 = null,
        public mixed $ipv6 = null,
        public ?CarbonImmutable $lastSeenAt = null,
        public ?string $siteName = null,
        public ?string $switchRole = null,
        public ?string $deployment = null,
        public ?string $deviceFunction = null,
        public ?string $type = null,
        public ?string $macAddress = null,
        public ?string $publicIp = null,
        public ?string $id = null,
        public ?string $deviceName = null,
        public ?string $serialNumber = null,
        public ?string $model = null,
        public ?string $siteId = null,
        public ?string $partNumber = null,
        public ?string $status = null,
        public ?int $uptimeInMillis = null,
        public ?string $stackId = null,
        public ?int $stackMemberId = null,
        public ?string $switchType = null,
        public ?array $switchTrends = null,
    ) {}
}
