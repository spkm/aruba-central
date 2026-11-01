<?php

namespace spkm\ArubaCentral\Classic\Data\Presence;

use spkm\ArubaCentral\Data\Data;

/**
 * A ConnectedVisitorStatus record.
 */
readonly class ConnectedVisitorStatus extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $data
     */
    public function __construct(
        /** Keys: visitor_status. */
        public ?array $data = null,
    ) {}
}
