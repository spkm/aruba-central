<?php

namespace spkm\ArubaCentral\Classic\Data\AiOps;

use spkm\ArubaCentral\Data\Data;

/**
 * A InsightExport record.
 */
readonly class InsightExport extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $data
     */
    public function __construct(
        /** Details for single insight Keys: insight_id, insight, timestamp, timestamp_str, recommendations, trend, rollups. */
        public ?array $data = null,
    ) {}
}
