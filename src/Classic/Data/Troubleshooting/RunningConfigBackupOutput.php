<?php

namespace spkm\ArubaCentral\Classic\Data\Troubleshooting;

use spkm\ArubaCentral\Data\Data;

/**
 * A RunningConfigBackupOutput record.
 */
readonly class RunningConfigBackupOutput extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Full name of the backup (used to retrieve the backup) */
        public ?string $name = null,
        /** Time when backup was taken */
        public ?string $time = null,
        /** Serial number of the device */
        public ?string $serial = null,
        /** Text output of the running config */
        public ?string $output = null,
    ) {}
}
