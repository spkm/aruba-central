<?php

namespace spkm\ArubaCentral\Classic\Data\AppRf;

use spkm\ArubaCentral\Data\Data;

/**
 * A ApprfTopNStats record.
 */
readonly class ApprfTopNStats extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $result
     */
    public function __construct(
        /** Keys: app_cat, app_id, web_id, web_rep, uplink_id, policy_rep. */
        public ?array $result = null,
    ) {}
}
