<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A Job record.
 */
readonly class Job extends Data
{
    /**
     * @param  array<mixed>|null  $jobid
     */
    public function __construct(
        public ?array $jobid = null,
    ) {}
}
