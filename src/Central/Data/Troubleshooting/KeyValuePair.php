<?php

namespace spkm\ArubaCentral\Central\Data\Troubleshooting;

use spkm\ArubaCentral\Data\Data;

/**
 * A KeyValuePair record.
 */
readonly class KeyValuePair extends Data
{
    public function __construct(
        /** Label or key for the attribute. */
        public ?string $label = null,
        /** Value of the attribute. */
        public ?string $value = null,
    ) {}
}
