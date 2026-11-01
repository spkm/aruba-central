<?php

namespace spkm\ArubaCentral\Classic\Data\AiOps;

use spkm\ArubaCentral\Data\Data;

/**
 * A ConnectivityExport record.
 */
readonly class ConnectivityExport extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $experience
     * @param  array<mixed>|null  $rollups
     * @param  array<mixed>|null  $failures
     * @param  array<mixed>|null  $delays
     */
    public function __construct(
        /** stage name */
        public ?string $stage = null,
        /** success percentage of stage */
        public ?int $overall_success_percent = null,
        /** Keys: attempts, keys, samples. */
        public ?array $experience = null,
        /** list of rollups for selected stage */
        public ?array $rollups = null,
        /** Keys: summary, rollups. */
        public ?array $failures = null,
        /** Keys: summary, rollups. */
        public ?array $delays = null,
    ) {}
}
