<?php

namespace spkm\ArubaCentral\Classic\Data\Syslog;

use spkm\ArubaCentral\Data\Data;

/**
 * A Flowlist record.
 */
readonly class Flowlist extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $success
     * @param  array<mixed>|null  $failed
     */
    public function __construct(
        public ?array $success = null,
        public ?array $failed = null,
    ) {}
}
