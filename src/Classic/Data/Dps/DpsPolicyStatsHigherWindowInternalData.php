<?php

namespace spkm\ArubaCentral\Classic\Data\Dps;

use spkm\ArubaCentral\Data\Data;

/**
 * A DpsPolicyStatsHigherWindowInternalData record.
 */
readonly class DpsPolicyStatsHigherWindowInternalData extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $dps_overall_policy_session_stats_data
     * @param  array<mixed>|null  $dps_policy_status_data
     * @param  array<mixed>|null  $dps_individual_uplink_policy_session_stats_data
     * @param  array<mixed>|null  $dps_individual_uplink_policy_stats_data
     * @param  array<mixed>|null  $dps_overall_policy_compliance_stats_data
     * @param  array<mixed>|null  $dps_policy_compliance_percentage_data
     */
    public function __construct(
        public ?array $dps_overall_policy_session_stats_data = null,
        /** Dps Policy Status Internal Data */
        public ?array $dps_policy_status_data = null,
        /** Sampling window in seconds */
        public ?int $interval = null,
        /** Name of the DPS Policy for a given BOC */
        public ?string $policy_name = null,
        public ?array $dps_individual_uplink_policy_session_stats_data = null,
        public ?array $dps_individual_uplink_policy_stats_data = null,
        public ?array $dps_overall_policy_compliance_stats_data = null,
        /** Dps Policy Compliance Percentage Internal Data */
        public ?array $dps_policy_compliance_percentage_data = null,
    ) {}
}
