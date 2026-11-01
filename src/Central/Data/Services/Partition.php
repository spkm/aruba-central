<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A Partition record.
 */
readonly class Partition extends Data
{
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?string $apSerial = null,
        public ?string $band = null,
        public ?int $docCount = null,
        public ?string $radioMac = null,
        public ?string $rfDomainId = null,
        public ?string $rfPartitionId = null,
        public ?string $rfPartitionTimestamp = null,
        public ?string $rfPartitionType = null,
        public ?string $shardAttr = null,
        public ?string $siteId = null,
        public ?string $tenantId = null,
        public ?int $updateTimestamp = null,
        public ?string $requestId = null,
        public ?string $apCoveragePlanTimestamp = null,
        /** Monotonically increasing update counter */
        public ?int $generation = null,
        /** RFC 3339 creation timestamp */
        public ?CarbonImmutable $createdAt = null,
        /** RFC 3339 last update timestamp */
        public ?CarbonImmutable $updatedAt = null,
    ) {}
}
