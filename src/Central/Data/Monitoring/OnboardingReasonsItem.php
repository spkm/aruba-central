<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A OnboardingReasonsItem record.
 */
readonly class OnboardingReasonsItem extends Data
{
    /**
     * @param  array<mixed>|null  $reasons
     */
    public function __construct(
        /** Stage name in uppercase. */
        public ?string $type = null,
        /** Top reason values (up to 5) for the stage and status. */
        public ?array $reasons = null,
    ) {}
}
