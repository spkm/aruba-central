<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A ArubaLacpLacpSchemaGet record.
 */
readonly class ArubaLacpLacpSchemaGet extends Data
{
    protected const ALIASES = ['system_priority' => 'system-priority'];

    public function __construct(
        /** lacp global src-dst hashing. One of: L2, L3, L4. */
        public ?string $hash = null,
        /** System priority used in LACP negotiation. */
        public ?int $system_priority = null,
    ) {}
}
