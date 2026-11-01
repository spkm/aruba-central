<?php

namespace spkm\ArubaCentral\Classic\Data\Dps;

use spkm\ArubaCentral\Data\Data;

/**
 * A DpsPoliciesStatusInternalData record.
 */
readonly class DpsPoliciesStatusInternalData extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Epoch Timestamp in milliseconds */
        public ?int $timestamp = null,
        /** Status of the DPS Policy for a given BOC, Could either be Compliant or Non Compliant */
        public ?string $policy_status = null,
        /** Name of the DPS Policy for a given BOC */
        public ?string $policy_name = null,
    ) {}
}
