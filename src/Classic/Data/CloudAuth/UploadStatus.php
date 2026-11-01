<?php

namespace spkm\ArubaCentral\Classic\Data\CloudAuth;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A UploadStatus record.
 */
readonly class UploadStatus extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $details
     * @param  array<mixed>|null  $stats
     */
    public function __construct(
        /** This field's schema will depend on upload type */
        public ?array $details = null,
        /** A Duration represents the elapsed time between two instants as an int64 nanosecond count. The representation limits the largest representable duration to… */
        public ?int $durationNanos = null,
        /** Name of the uploaded file */
        public ?string $fileName = null,
        /** Time at which the upload status was last updated */
        public ?CarbonImmutable $lastUpdatedAt = null,
        /** Keys: completed, failed, total. */
        public ?array $stats = null,
        public ?string $status = null,
        /** Time at which the upload request was submitted */
        public ?CarbonImmutable $submittedAt = null,
    ) {}
}
