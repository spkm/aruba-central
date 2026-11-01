<?php

namespace spkm\ArubaCentral\Central\Data\Troubleshooting;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A DeviceInfoRespItem record.
 */
readonly class DeviceInfoRespItem extends Data
{
    /**
     * @param  array<mixed>|null  $deviceInfo
     */
    public function __construct(
        /** Primary identifier for the resource given by the system. */
        public ?string $id = null,
        /** The type of the resource, prefixed by the API group name. */
        public ?string $type = null,
        /** Monotonically increasing counter incremented on each update. */
        public ?int $generation = null,
        /** RFC 3339 timestamp when the resource was created. */
        public ?CarbonImmutable $createdAt = null,
        /** RFC 3339 timestamp when the resource was last updated. */
        public ?CarbonImmutable $updatedAt = null,
        /** Device serial number */
        public ?string $serialNumber = null,
        /** Status of retrieving device information (Success/Error) */
        public ?string $status = null,
        /** Description of the device information status */
        public ?string $description = null,
        /** Class of the device (e.g., c2c, iap) */
        public ?string $deviceClass = null,
        /** Number of times the device information was updated. */
        public ?int $updateTimes = null,
        /** Detailed device information. */
        public ?array $deviceInfo = null,
    ) {}
}
