<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use spkm\ArubaCentral\Data\Data;

/**
 * A ApRangingScanStatus record.
 */
readonly class ApRangingScanStatus extends Data
{
    /**
     * @param  array<mixed>|null  $serialNumbers
     * @param  array<mixed>|null  $scannedChannels
     */
    public function __construct(
        /** A unique system generated identifier for an ftm scan. This is a string representation of a uint64. */
        public ?string $id = null,
        /** A string indicating the document type. One of: FTM_SCAN. */
        public ?string $type = null,
        /** Timestamp in ISO 8601 format with a precision of seconds. The time is in the UTC timezone. Format: [YYYY]-[MM]-[DD]T[hh]:[mm]:[ss] */
        public ?string $createdAt = null,
        /** Timestamp in ISO 8601 format with a precision of seconds. The time is in the UTC timezone. Format: [YYYY]-[MM]-[DD]T[hh]:[mm]:[ss] */
        public ?string $updatedAt = null,
        /** The Site ID associated with the device commonly in UUID format. */
        public ?string $siteId = null,
        /** The Floor ID associated with the device in UUID format. */
        public ?string $floorId = null,
        /** The current scan state. PENDING - Scan request was accepted and awaiting scheduling by the system. ABORTED - Scan request was delayed and could not be… One of: PENDING, ABORTED, CANCELLED, SCHEDULED, SCANNING, COMPLETE. */
        public ?string $status = null,
        public ?array $serialNumbers = null,
        /** Timestamp in ISO 8601 format with a precision of seconds. The time is in the UTC timezone. Format: [YYYY]-[MM]-[DD]T[hh]:[mm]:[ss] */
        public ?string $scanStartTime = null,
        /** Timestamp in ISO 8601 format with a precision of seconds. The time is in the UTC timezone. Format: [YYYY]-[MM]-[DD]T[hh]:[mm]:[ss] */
        public ?string $estimatedCompletionTime = null,
        /** The number of milliseconds that the scan spends on each channel to attempt ranging to other nearby APs. */
        public ?int $dwellTimeMillis = null,
        public ?array $scannedChannels = null,
        /** An error message (if applicable). Indicates the reason for the scan failure. */
        public ?string $errorMessage = null,
    ) {}
}
