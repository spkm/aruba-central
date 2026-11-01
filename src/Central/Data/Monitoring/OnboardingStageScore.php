<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A OnboardingStageScore record.
 */
readonly class OnboardingStageScore extends Data
{
    public function __construct(
        /** The onboarding stage. */
        public ?string $stage = null,
        /** The stage score as a percentage number string; `-1` when unavailable. */
        public ?string $score = null,
        /** The stage score percentage display value. */
        public ?string $scorePercentage = null,
    ) {}
}
