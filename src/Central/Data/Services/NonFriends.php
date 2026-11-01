<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A NonFriends record.
 */
readonly class NonFriends extends Data
{
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?string $tenantId = null,
        public ?string $apSerial = null,
        public ?string $siteId = null,
        public ?string $radioMac = null,
        public ?string $band = null,
        public ?int $timestamp = null,
        public ?string $nonfriendsList = null,
        /** Monotonically increasing update counter */
        public ?int $generation = null,
        /** RFC 3339 creation timestamp */
        public ?CarbonImmutable $createdAt = null,
        /** RFC 3339 last update timestamp */
        public ?CarbonImmutable $updatedAt = null,
    ) {}
}
