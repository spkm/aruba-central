<?php

namespace spkm\ArubaCentral\Central\Data\Troubleshooting;

use spkm\ArubaCentral\Data\Data;

/**
 * A EventFilters record.
 */
readonly class EventFilters extends Data
{
    /**
     * @param  array<mixed>|null  $categories
     * @param  array<mixed>|null  $sourceTypes
     * @param  array<mixed>|null  $eventNames
     */
    public function __construct(
        /** Available event categories with their counts. A list of CategoryFilterItem records. */
        public ?array $categories = null,
        /** Available source types with their counts. A list of SourceTypeFilterItem records. */
        public ?array $sourceTypes = null,
        /** Available event names and their corresponding event IDs with their counts. A list of EventNameFilterItem records. */
        public ?array $eventNames = null,
    ) {}
}
