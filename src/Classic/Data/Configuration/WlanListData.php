<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A WlanListData record.
 */
readonly class WlanListData extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $wlans
     */
    public function __construct(
        /** Keys: name, essid, type, is_locked. */
        public ?array $wlans = null,
    ) {}
}
