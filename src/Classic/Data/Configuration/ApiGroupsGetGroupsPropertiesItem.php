<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A ApiGroupsGetGroupsPropertiesItem record.
 */
readonly class ApiGroupsGetGroupsPropertiesItem extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $properties
     */
    public function __construct(
        /** Group Name */
        public ?string $group = null,
        /** Properties set for groups */
        public ?array $properties = null,
    ) {}
}
