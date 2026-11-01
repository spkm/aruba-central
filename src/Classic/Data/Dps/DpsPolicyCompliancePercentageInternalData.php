<?php

namespace spkm\ArubaCentral\Classic\Data\Dps;

use spkm\ArubaCentral\Data\Data;

/**
 * A DpsPolicyCompliancePercentageInternalData record.
 */
readonly class DpsPolicyCompliancePercentageInternalData extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $uplinks_compliance_percentage
     */
    public function __construct(
        /** List of Dps Policy Uplinks Compliance Percentage Internal Data */
        public ?array $uplinks_compliance_percentage = null,
        /** Overall Dps Policies Uplinks Compliance Percentage Data */
        public ?float $overall_compliance_percentage = null,
        /** Name of the DPS Policy for a given BOC */
        public ?string $policy_name = null,
    ) {}
}
