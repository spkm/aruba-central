<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A Device record.
 */
readonly class Device extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $connectedTo
     * @param  array<mixed>|null  $deviceClasses
     * @param  array<mixed>|null  $fields
     * @param  array<mixed>|null  $lastReporters
     */
    public function __construct(
        /** One of: BLE_MAC_PUBLIC, BLE_MAC_PRIVATE, ZIGBEE_MAC, UNRECOGNIZED. */
        public ?string $addressType = null,
        public ?string $collectorId = null,
        public ?array $connectedTo = null,
        public ?string $customerId = null,
        public ?string $deviceAddress = null,
        public ?string $deviceAddressId = null,
        public ?array $deviceClasses = null,
        public ?string $deviceId = null,
        /** One of: BLE, ZIGBEE, UNRECOGNIZED. */
        public ?string $deviceType = null,
        public ?array $fields = null,
        public ?float $lastBatteryLevel = null,
        public ?array $lastReporters = null,
        public ?CarbonImmutable $lastSeen = null,
        public ?string $nwkAddress = null,
        public ?CarbonImmutable $updatedAt = null,
        public ?int $uptime = null,
    ) {}
}
