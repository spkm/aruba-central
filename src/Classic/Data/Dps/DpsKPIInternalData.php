<?php

namespace spkm\ArubaCentral\Classic\Data\Dps;

use spkm\ArubaCentral\Data\Data;

/**
 * A DpsKPIInternalData record.
 */
readonly class DpsKPIInternalData extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Epoch Timestamp in milliseconds */
        public ?int $timestamp = null,
        /** Total DPS Compliant Policies for a given BOC */
        public ?int $compliant_policies = null,
        /** Total DPS Policies for a given BOC */
        public ?int $total_policies = null,
    ) {}
}
