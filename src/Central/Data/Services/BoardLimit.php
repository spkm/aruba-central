<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A BoardLimit record.
 */
readonly class BoardLimit extends Data
{
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?string $apModel = null,
        public ?string $band = null,
        public ?string $bandwidth = null,
        public ?float $maxEirpDbm = null,
        public ?int $maxEirp = null,
        /** Monotonically increasing update counter */
        public ?int $generation = null,
        /** RFC 3339 creation timestamp */
        public ?CarbonImmutable $createdAt = null,
        /** RFC 3339 last update timestamp */
        public ?CarbonImmutable $updatedAt = null,
    ) {}
}
