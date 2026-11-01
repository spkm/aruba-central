<?php

namespace spkm\ArubaCentral\Classic\Data\Troubleshooting;

use spkm\ArubaCentral\Data\Data;

/**
 * A RunningConfigListItem record.
 */
readonly class RunningConfigListItem extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Prefix for the backup name */
        public ?string $prefix = null,
        /** Full name of the backup (used to retrieve the backup) */
        public ?string $name = null,
        /** Time when backup was taken */
        public ?string $timestamp = null,
        /** Serial number of the device */
        public ?string $serial = null,
        /** Status of the request */
        public ?string $status = null,
    ) {}
}
