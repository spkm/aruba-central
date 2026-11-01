<?php

namespace spkm\ArubaCentral\Classic\Data\Troubleshooting;

use spkm\ArubaCentral\Data\Data;

/**
 * A TroubleshootOutput record.
 */
readonly class TroubleshootOutput extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Serial of device */
        public ?string $serial = null,
        /** Hostname of device */
        public ?string $hostname = null,
        /** Output of troubleshooting session */
        public ?string $output = null,
        /** State of troubleshooting session whether it is RUNNING or COMPLETED or EXPIRED */
        public ?string $status = null,
        /** Description for status */
        public ?string $message = null,
    ) {}
}
