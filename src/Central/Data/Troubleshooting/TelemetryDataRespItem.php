<?php

namespace spkm\ArubaCentral\Central\Data\Troubleshooting;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A TelemetryDataRespItem record.
 */
readonly class TelemetryDataRespItem extends Data
{
    /**
     * @param  array<mixed>|null  $telemetryData
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
        /** Status of retrieving telemetry data (Success/Error) */
        public ?string $status = null,
        /** Description of the telemetry data status */
        public ?string $description = null,
        /** Class of the device (e.g., c2c, iap) */
        public ?string $deviceClass = null,
        /** Number of times the telemetry data was updated. */
        public ?int $updateTimes = null,
        /** Number of times the telemetry data was queried. */
        public ?int $queryTimes = null,
        /** Timestamp of the last query. */
        public ?CarbonImmutable $queriedAt = null,
        /** Array of telemetry data paths and their corresponding data. */
        public ?array $telemetryData = null,
    ) {}
}
