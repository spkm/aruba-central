<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A SnapshotInfo record.
 */
readonly class SnapshotInfo extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Backup name. */
        public ?string $name = null,
        /** Flag to represent if the snapshot can be deleted automatically by system when creating new snapshot or not. */
        public ?bool $do_not_delete = null,
        /** Backup start timestamp in epoch-secs. */
        public ?int $backup_start_timestamp = null,
        /** Username of user who created the backup. */
        public ?string $created_by = null,
    ) {}
}
