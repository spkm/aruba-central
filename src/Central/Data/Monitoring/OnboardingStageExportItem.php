<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A OnboardingStageExportItem record.
 */
readonly class OnboardingStageExportItem extends Data
{
    /**
     * @param  array<mixed>|null  $data
     */
    public function __construct(
        /** Onboarding stage key. One of: assoc, auth, dhcp, dns. */
        public ?string $type = null,
        public ?array $data = null,
    ) {}
}
