<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A ServiceConfig record.
 */
readonly class ServiceConfig extends Data
{
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?string $deployHour = null,
        public ?string $deployWindow = null,
        /** One of: true, false. */
        public ?string $enable = null,
        public ?string $globalId = null,
        public ?string $qualityThreshold2Ghz = null,
        public ?string $qualityThreshold5Ghz = null,
        public ?string $qualityThreshold6Ghz = null,
        public ?string $scopeId = null,
        public ?string $tenantId = null,
        public ?int $updateTimestamp = null,
        /** Monotonically increasing update counter */
        public ?int $generation = null,
        /** RFC 3339 creation timestamp */
        public ?CarbonImmutable $createdAt = null,
        /** RFC 3339 last update timestamp */
        public ?CarbonImmutable $updatedAt = null,
    ) {}
}
