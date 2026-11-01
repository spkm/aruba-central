<?php

namespace spkm\ArubaCentral\Classic\Data\Presence;

use spkm\ArubaCentral\Data\Data;

/**
 * A LoyaltyDataPoints record.
 */
readonly class LoyaltyDataPoints extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $allowed_frequency
     * @param  array<mixed>|null  $fields
     * @param  array<mixed>|null  $samples
     */
    public function __construct(
        public ?array $allowed_frequency = null,
        public ?array $fields = null,
        public ?array $samples = null,
    ) {}
}
