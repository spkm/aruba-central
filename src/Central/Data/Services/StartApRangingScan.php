<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use spkm\ArubaCentral\Data\Data;

/**
 * A StartApRangingScan record.
 */
readonly class StartApRangingScan extends Data
{
    /**
     * @param  array<mixed>|null  $serialNumbers
     */
    public function __construct(
        /** A unique system generated identifier for an ftm scan. This is a string representation of a uint64. */
        public ?string $id = null,
        /** Timestamp in ISO 8601 format with a precision of seconds. The time is in the UTC timezone. Format: [YYYY]-[MM]-[DD]T[hh]:[mm]:[ss] */
        public ?string $scanStartTime = null,
        /** List of serial numbers of the APs that will be performing the scan. A list of SerialNumberopen records. */
        public ?array $serialNumbers = null,
        /** Timestamp in ISO 8601 format with a precision of seconds. The time is in the UTC timezone. Format: [YYYY]-[MM]-[DD]T[hh]:[mm]:[ss] */
        public ?string $estimatedCompletionTime = null,
        /** The start scan request outcome. SUCCESS - Scan was successfully created and is now PENDING SCAN_ALREADY_ACTIVE - Scan already active on the given floor-id.… One of: SUCCESS, SCAN_ALREADY_ACTIVE, NOT_ENOUGH_APS, REGULATORY_DOMAIN_MISMATCH, NO_VALID_CHANNELS, ERROR, DRY_RUN. */
        public ?string $result = null,
        /** Error details in the case that a scan could not be started. */
        public ?string $errorMessage = null,
    ) {}
}
