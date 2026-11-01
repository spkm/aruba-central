<?php

namespace spkm\ArubaCentral\Central\Data\Troubleshooting;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A OperationGetRespItem record.
 */
readonly class OperationGetRespItem extends Data
{
    /**
     * @param  array<mixed>|null  $troubleshootingStatus
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
        /** Operation state One of: IDLE, START, STOP, CLEAR. */
        public ?string $operation = null,
        /** Device class (e.g., c2c, iap) */
        public ?string $deviceClass = null,
        /** Device operation status (Success/Error) */
        public ?string $status = null,
        /** Description of the operation result */
        public ?string $description = null,
        /** Status of different troubleshooting data types */
        public ?array $troubleshootingStatus = null,
    ) {}
}
