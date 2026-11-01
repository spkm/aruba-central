<?php

namespace spkm\ArubaCentral\Classic\Data\Dps;

use spkm\ArubaCentral\Data\Data;

/**
 * A DpsSitePolicyStatsInternalData record.
 */
readonly class DpsSitePolicyStatsInternalData extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $dps_overall_policy_compliance_stats_data
     * @param  array<mixed>|null  $dps_individual_policy_compliance_stats_data
     */
    public function __construct(
        /** Sampling window in seconds */
        public ?int $interval = null,
        public ?array $dps_overall_policy_compliance_stats_data = null,
        public ?array $dps_individual_policy_compliance_stats_data = null,
    ) {}
}
