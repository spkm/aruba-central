<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A BulkSiteAssociation record.
 */
readonly class BulkSiteAssociation extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $success
     * @param  array<mixed>|null  $failed
     */
    public function __construct(
        /** List of device serials numbers to which site was succesully un/associated with Keys: device_id. */
        public ?array $success = null,
        /** List of device serials which for which site un/association failed with reasons Keys: device_id, reason. */
        public ?array $failed = null,
    ) {}
}
