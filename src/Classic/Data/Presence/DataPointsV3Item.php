<?php

namespace spkm\ArubaCentral\Classic\Data\Presence;

use spkm\ArubaCentral\Data\Data;

/**
 * A DataPointsV3Item record.
 */
readonly class DataPointsV3Item extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $allowed_frequency
     * @param  array<mixed>|null  $data
     */
    public function __construct(
        public ?array $allowed_frequency = null,
        /** customer id */
        public ?string $customer_id = null,
        public ?string $category = null,
        public ?string $xunits = null,
        public ?string $yunits = null,
        public ?array $data = null,
    ) {}
}
