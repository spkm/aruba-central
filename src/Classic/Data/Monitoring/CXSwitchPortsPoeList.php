<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A CXSwitchPortsPoeList record.
 */
readonly class CXSwitchPortsPoeList extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $data
     */
    public function __construct(
        /** Keys: count, poe_details. */
        public ?array $data = null,
    ) {}
}
