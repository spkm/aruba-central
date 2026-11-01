<?php

namespace spkm\ArubaCentral\Classic\Data\Troubleshooting;

use spkm\ArubaCentral\Data\Data;

/**
 * A Command record.
 */
readonly class Command extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $arguments
     */
    public function __construct(
        /** Command cli */
        public ?string $command = null,
        /** Description of command */
        public ?string $summary = null,
        /** Category of specific command */
        public ?string $category = null,
        /** Command ID */
        public ?int $command_id = null,
        /** List of arguments if command takes any */
        public ?array $arguments = null,
    ) {}
}
