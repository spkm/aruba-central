<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A SitePutRPCOutputSchema record.
 */
readonly class SitePutRPCOutputSchema extends Data
{
    /**
     * @param  array<mixed>|null  $items
     */
    public function __construct(
        /** The return code of site update operation. */
        public ?string $code = null,
        /** A list of ScopeIds records. */
        public ?array $items = null,
        /** The message of site update operation. */
        public ?string $message = null,
        /** Site Update operation status. */
        public ?string $status = null,
    ) {}
}
