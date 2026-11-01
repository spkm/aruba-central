<?php

namespace spkm\ArubaCentral\Classic\Data\Firmware;

use spkm\ArubaCentral\Data\Data;

/**
 * A CommandStatus record.
 */
readonly class CommandStatus extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** State of firmware upgrade */
        public ?string $state = null,
        /** Description of specific state */
        public ?string $reason = null,
        /** If firmware upgrade scheduled then firmware_scheduled_at will be epoch time in seconds */
        public ?int $firmware_scheduled_at = null,
    ) {}
}
