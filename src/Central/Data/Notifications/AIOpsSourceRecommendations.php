<?php

namespace spkm\ArubaCentral\Central\Data\Notifications;

use spkm\ArubaCentral\Data\Data;

/**
 * A AIOpsSourceRecommendations record.
 */
readonly class AIOpsSourceRecommendations extends Data
{
    /**
     * @param  array<mixed>|null  $impactedSites
     */
    public function __construct(
        public ?string $timestamp = null,
        public ?string $tenantId = null,
        public ?string $siteId = null,
        public ?string $title = null,
        public ?string $description = null,
        public ?string $category = null,
        public ?string $insightId = null,
        /** Unique identifier for this record. */
        public ?string $id = null,
        public ?string $type = null,
        public ?array $impactedSites = null,
        /** Complete recommendation payload serialized as a JSON string. Contains detailed information about the recommendation, including root cause analysis, and… */
        public ?string $data = null,
    ) {}
}
