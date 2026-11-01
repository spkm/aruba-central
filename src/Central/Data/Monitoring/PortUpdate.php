<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A PortUpdate record.
 */
readonly class PortUpdate extends Data
{
    /**
     * @param  array<mixed>|null  $items
     */
    public function __construct(
        /** Aggregate result for the requested switch or logical stack. Individual port results are reported in the nested `ports` array. A list of PortUpdateItem records. */
        public ?array $items = null,
        /** Resource type identifier. */
        public ?string $type = null,
        /** Number of result sets returned. */
        public ?int $count = null,
    ) {}
}
