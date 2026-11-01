<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A CdaJob record.
 */
readonly class CdaJob extends Data
{
    /**
     * @param  array<mixed>|null  $errorArgs
     */
    public function __construct(
        /** Timestamp when the job was completed (ISO 8601 format) */
        public ?string $completedAt = null,
        /** Timestamp when the job was created (ISO 8601 format) */
        public ?string $createdAt = null,
        /** Number of duplicate records */
        public ?int $duplicateCount = null,
        /** Error args to format error string */
        public ?array $errorArgs = null,
        /** Error code for the job */
        public ?string $errorCode = null,
        /** Number of records that encountered errors */
        public ?int $errorCount = null,
        /** Error message for the job */
        public ?string $errorMessage = null,
        /** Unique identifier for the job */
        public ?string $id = null,
        /** Identity store associated with the Named MPSK authentication profile */
        public ?string $identityStoreID = null,
        /** Timestamp when the job was last updated (ISO 8601 format) */
        public ?string $lastUpdatedAt = null,
        /** Indicates the progress of the job */
        public ?float $progressPercentage = null,
        /** Represents status of a job */
        public ?string $status = null,
        /** Number of records that have been processed successfully */
        public ?int $successCount = null,
        /** Supported cda job types */
        public ?string $type = null,
    ) {}
}
