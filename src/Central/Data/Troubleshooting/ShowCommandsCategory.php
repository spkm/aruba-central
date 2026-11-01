<?php

namespace spkm\ArubaCentral\Central\Data\Troubleshooting;

use spkm\ArubaCentral\Data\Data;

/**
 * A ShowCommandsCategory record.
 */
readonly class ShowCommandsCategory extends Data
{
    /**
     * @param  array<mixed>|null  $commands
     */
    public function __construct(
        /** A logical category/group name for the commands. */
        public ?string $categoryName = null,
        /** Number of commands under this category. */
        public ?int $count = null,
        /** Commands under this category. A list of ShowCommandsCommand records. */
        public ?array $commands = null,
    ) {}
}
