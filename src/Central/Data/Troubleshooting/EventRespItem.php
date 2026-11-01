<?php

namespace spkm\ArubaCentral\Central\Data\Troubleshooting;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A EventRespItem record.
 */
readonly class EventRespItem extends Data
{
    /**
     * @param  array<mixed>|null  $eventBody
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
        /** Class of the device (e.g., c2c, iap) */
        public ?string $deviceClass = null,
        /** Identifier for the event type. */
        public ?string $eventId = null,
        /** Detailed event information. */
        public ?array $eventBody = null,
        /** Timestamp when the event occurred. */
        public ?CarbonImmutable $occurredAt = null,
    ) {}
}
