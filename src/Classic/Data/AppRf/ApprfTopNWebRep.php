<?php

namespace spkm\ArubaCentral\Classic\Data\AppRf;

use spkm\ArubaCentral\Data\Data;

/**
 * A ApprfTopNWebRep record.
 */
readonly class ApprfTopNWebRep extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $result
     */
    public function __construct(
        /** Keys: web_rep. */
        public ?array $result = null,
    ) {}
}
