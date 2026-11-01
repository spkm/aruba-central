<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A Job record.
 */
readonly class Job extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $tenant_radio_list
     */
    public function __construct(
        /** Timezone */
        public ?string $timezone = null,
        /** Sequence Number */
        public ?int $seq = null,
        /** Deployment Time */
        public ?int $deploy_time = null,
        /** Computation Timing */
        public ?int $compute_time = null,
        /** List of all the radio for a tenant */
        public ?array $tenant_radio_list = null,
        /** Time at which solution will be deployed */
        public ?int $deploy_hr = null,
        /** Estimated Time in minutes */
        public ?int $est_time = null,
    ) {}
}
