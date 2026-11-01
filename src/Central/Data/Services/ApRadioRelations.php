<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A ApRadioRelations record.
 */
readonly class ApRadioRelations extends Data
{
    protected const ALIASES = ['from_' => 'from'];

    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?string $from_ = null,
        public ?string $to = null,
        public ?string $apSerial = null,
        public ?string $radioMac = null,
        public ?string $tenantId = null,
        public ?int $purgeAfter = null,
        /** Monotonically increasing update counter */
        public ?int $generation = null,
        /** RFC 3339 creation timestamp */
        public ?CarbonImmutable $createdAt = null,
        /** RFC 3339 last update timestamp */
        public ?CarbonImmutable $updatedAt = null,
    ) {}
}
