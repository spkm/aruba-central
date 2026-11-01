<?php

namespace spkm\ArubaCentral\Classic\Data\Troubleshooting;

use spkm\ArubaCentral\Data\Data;

/**
 * A RunningConfig record.
 */
readonly class RunningConfig extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $accepted
     * @param  array<mixed>|null  $rejected
     */
    public function __construct(
        /** List of serials (switches) for which backup will be attempted A list of RunningConfigResponseItem records. */
        public ?array $accepted = null,
        /** List of serials (switches) for which backup will not be attempted A list of RunningConfigResponseItem records. */
        public ?array $rejected = null,
    ) {}
}
