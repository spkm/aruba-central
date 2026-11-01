<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A RadioPartition record.
 */
readonly class RadioPartition extends Data
{
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?string $rfDomainId = null,
        public ?string $rfPartitionId = null,
        public ?string $band = null,
        public ?int $updateTimestamp = null,
        /** Monotonically increasing update counter */
        public ?int $generation = null,
        /** RFC 3339 creation timestamp */
        public ?CarbonImmutable $createdAt = null,
        /** RFC 3339 last update timestamp */
        public ?CarbonImmutable $updatedAt = null,
    ) {}
}
