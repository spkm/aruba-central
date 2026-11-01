<?php

namespace spkm\ArubaCentral\Classic\Data\ClientMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A Response record.
 */
readonly class Response extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Status of the API call. */
        public ?string $status = null,
        /** Result of the API call. */
        public ?string $result = null,
    ) {}
}
