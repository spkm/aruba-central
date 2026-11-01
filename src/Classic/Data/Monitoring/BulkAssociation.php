<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A BulkAssociation record.
 */
readonly class BulkAssociation extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $success
     * @param  array<mixed>|null  $failed
     */
    public function __construct(
        /** List of device serials numbers to which label was succesully un/associated with Keys: device_id. */
        public ?array $success = null,
        /** List of device serials which for which label un/association failed with reasons Keys: device_id, reason. */
        public ?array $failed = null,
    ) {}
}
