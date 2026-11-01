<?php

namespace spkm\ArubaCentral\Central\Data\Notifications;

use spkm\ArubaCentral\Data\Data;

/**
 * A AIOpsInsightsSchemasResult record.
 */
readonly class AIOpsInsightsSchemasResult extends Data
{
    public function __construct(
        /** JSON string containing schema definitions keyed by insight ID. */
        public ?string $schemaJson = null,
        /** Number of insight schemas returned. */
        public ?int $count = null,
    ) {}
}
