<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A ApCoveragePlan record.
 */
readonly class ApCoveragePlan extends Data
{
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?string $apOpmode = null,
        public ?string $apSerial = null,
        public ?int $updateTimestamp = null,
        public ?int $feasibleOpmodeSnapshotTimestamp = null,
        public ?int $effectiveTimestamp = null,
        public ?string $requestId = null,
        public ?string $tenantId = null,
        public ?string $siteId = null,
        public ?int $docCount = null,
        /** Monotonically increasing update counter */
        public ?int $generation = null,
        /** RFC 3339 creation timestamp */
        public ?CarbonImmutable $createdAt = null,
        /** RFC 3339 last update timestamp */
        public ?CarbonImmutable $updatedAt = null,
    ) {}
}
