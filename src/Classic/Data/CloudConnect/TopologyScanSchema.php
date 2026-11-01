<?php

namespace spkm\ArubaCentral\Classic\Data\CloudConnect;

use spkm\ArubaCentral\Data\Data;

/**
 * A TopologyScanSchema record.
 */
readonly class TopologyScanSchema extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?bool $status = null,
    ) {}
}
