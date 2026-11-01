<?php

namespace spkm\ArubaCentral\Classic\Data\Troubleshooting;

use spkm\ArubaCentral\Data\Data;

/**
 * A TroubleshootSessionId record.
 */
readonly class TroubleshootSessionId extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Session_id of the troubleshooting session */
        public ?string $session_id = null,
    ) {}
}
