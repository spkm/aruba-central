<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use spkm\ArubaCentral\Data\Data;

/**
 * A LaTrendsResponseForAPI record.
 */
readonly class LaTrendsResponseForAPI extends Data
{
    /**
     * @param  array<mixed>|null  $keys
     * @param  array<mixed>|null  $samples
     * @param  array<mixed>|null  $units
     */
    public function __construct(
        /** Tenant ID or site ID. */
        public ?string $id = null,
        /** Type of the analytics. */
        public ?string $type = null,
        /** List of the trends. */
        public ?array $keys = null,
        /** A list of Samples records. */
        public ?array $samples = null,
        /** Units for the corresponding keys. */
        public ?array $units = null,
    ) {}
}
