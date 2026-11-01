<?php

namespace spkm\ArubaCentral\Classic\Data\CloudConnect;

use spkm\ArubaCentral\Data\Data;

/**
 * A ConfigSummaryItem record.
 */
readonly class ConfigSummaryItem extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $configured
     */
    public function __construct(
        public ?string $branch_id = null,
        public ?string $branch_name = null,
        public ?array $configured = null,
    ) {}
}
