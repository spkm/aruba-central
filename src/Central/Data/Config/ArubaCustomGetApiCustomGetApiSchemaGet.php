<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A ArubaCustomGetApiCustomGetApiSchemaGet record.
 */
readonly class ArubaCustomGetApiCustomGetApiSchemaGet extends Data
{
    protected const ALIASES = ['get_next_gpid' => 'get-next-gpid'];

    public function __construct(
        /** Get next gpid. */
        public ?int $get_next_gpid = null,
    ) {}
}
