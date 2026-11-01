<?php

namespace spkm\ArubaCentral\Classic\Data\AppRf;

use spkm\ArubaCentral\Data\Data;

/**
 * A ApprfTopNAppCat record.
 */
readonly class ApprfTopNAppCat extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $result
     */
    public function __construct(
        /** Keys: app_cat. */
        public ?array $result = null,
    ) {}
}
