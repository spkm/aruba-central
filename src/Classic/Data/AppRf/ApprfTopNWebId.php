<?php

namespace spkm\ArubaCentral\Classic\Data\AppRf;

use spkm\ArubaCentral\Data\Data;

/**
 * A ApprfTopNWebId record.
 */
readonly class ApprfTopNWebId extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $result
     */
    public function __construct(
        /** Keys: web_id. */
        public ?array $result = null,
    ) {}
}
