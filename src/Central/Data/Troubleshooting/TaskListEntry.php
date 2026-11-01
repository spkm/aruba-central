<?php

namespace spkm\ArubaCentral\Central\Data\Troubleshooting;

use spkm\ArubaCentral\Data\Data;

/**
 * A TaskListEntry record.
 */
readonly class TaskListEntry extends Data
{
    /**
     * @param  array<mixed>|null  $locations
     */
    public function __construct(
        /** The name of the test or command (e.g., 'ping', 'showCommands'). */
        public ?string $testName = null,
        /** A list of one or more active/recent task locations for this test type. */
        public ?array $locations = null,
    ) {}
}
