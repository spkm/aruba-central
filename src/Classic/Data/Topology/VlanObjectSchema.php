<?php

namespace spkm\ArubaCentral\Classic\Data\Topology;

use spkm\ArubaCentral\Data\Data;

/**
 * A VlanObjectSchema record.
 */
readonly class VlanObjectSchema extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $vlanId = null,
        public ?string $vlanName = null,
    ) {}
}
