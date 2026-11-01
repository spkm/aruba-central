<?php

namespace spkm\ArubaCentral\Classic\Data\Troubleshooting;

use spkm\ArubaCentral\Data\Data;

/**
 * A TroubleshootResp record.
 */
readonly class TroubleshootResp extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Serial of device */
        public ?string $serial = null,
        /** State of troubleshooting session. Possible state are QUEUED or RUNNING */
        public ?string $status = null,
        /** Description for state QUEUED or RUNNING Whether troubleshooting session initiated successfully or troubleshooting session already running for device */
        public ?string $message = null,
        /** Unique ID to get troubleshooting output of device if troubleshooting session initiated successfully */
        public ?int $session_id = null,
    ) {}
}
