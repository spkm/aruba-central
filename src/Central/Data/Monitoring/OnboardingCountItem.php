<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A OnboardingCountItem record.
 */
readonly class OnboardingCountItem extends Data
{
    /**
     * @param  array<mixed>|null  $data
     */
    public function __construct(
        /** Stage key. */
        public ?string $type = null,
        public ?array $data = null,
    ) {}
}
