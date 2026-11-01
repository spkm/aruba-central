<?php

namespace spkm\ArubaCentral\Classic\Data\DeviceManagement;

use spkm\ArubaCentral\Data\Data;

/**
 * A ActionCommand record.
 */
readonly class ActionCommand extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Serial number of device. */
        public ?string $serial = null,
        /** Task id will be used to get status of command only if there is response for command else it will be None. Command response will be stored for 15 mints after… */
        public ?string $task_id = null,
        /** State of action command. Possible values for state are QUEUED, SUCCESS, FAILED, INVALID, EXPIRED. Once status expired then state will be EXPIRED. */
        public ?string $state = null,
    ) {}
}
