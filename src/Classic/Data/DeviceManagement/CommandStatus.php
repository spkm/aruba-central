<?php

namespace spkm\ArubaCentral\Classic\Data\DeviceManagement;

use spkm\ArubaCentral\Data\Data;

/**
 * A CommandStatus record.
 */
readonly class CommandStatus extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** State of action command. Possible values for state are QUEUED, SUCCESS, FAILED, INVALID, EXPIRED. */
        public ?string $state = null,
        /** Description for state */
        public ?string $reason = null,
    ) {}
}
