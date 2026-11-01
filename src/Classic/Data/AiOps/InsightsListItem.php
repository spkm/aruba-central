<?php

namespace spkm\ArubaCentral\Classic\Data\AiOps;

use spkm\ArubaCentral\Data\Data;

/**
 * A InsightsListItem record.
 */
readonly class InsightsListItem extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Insight ID */
        public ?int $insight_id = null,
        /** Description of an Insight */
        public ?string $description = null,
        /** Insight Name */
        public ?string $insight = null,
        /** Category of an insight */
        public ?string $category = null,
        /** Severity of an insight */
        public ?string $severity = null,
        public ?bool $is_config_recommendation_insight = null,
        /** Impact Information of Insight */
        public ?string $impact = null,
    ) {}
}
