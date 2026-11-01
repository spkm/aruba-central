<?php

namespace spkm\ArubaCentral\Classic\Data\AppRf;

use spkm\ArubaCentral\Data\Data;

/**
 * A ApprfTopNApp record.
 */
readonly class ApprfTopNApp extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $result
     */
    public function __construct(
        /** Keys: app_id. */
        public ?array $result = null,
    ) {}
}
