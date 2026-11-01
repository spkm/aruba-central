<?php

namespace spkm\ArubaCentral\Classic\Data\CloudAuth;

use spkm\ArubaCentral\Data\Data;

/**
 * A MPSKUsage record.
 */
readonly class MPSKUsage extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $ssids
     */
    public function __construct(
        public ?int $limit = null,
        public ?array $ssids = null,
        public ?int $used = null,
    ) {}
}
