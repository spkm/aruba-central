<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A SitePostRPCOutputSchema record.
 */
readonly class SitePostRPCOutputSchema extends Data
{
    /**
     * @param  array<mixed>|null  $items
     */
    public function __construct(
        /** The return code of site create operation. */
        public ?string $code = null,
        /** A list of ScopeIds records. */
        public ?array $items = null,
        /** The message of site create operation. */
        public ?string $message = null,
        /** Site Create operation status. */
        public ?string $status = null,
    ) {}
}
