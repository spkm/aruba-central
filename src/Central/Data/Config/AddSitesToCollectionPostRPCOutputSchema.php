<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A AddSitesToCollectionPostRPCOutputSchema record.
 */
readonly class AddSitesToCollectionPostRPCOutputSchema extends Data
{
    /**
     * @param  array<mixed>|null  $items
     */
    public function __construct(
        /** The return code of sites add to site-collection operation. */
        public ?string $code = null,
        /** A list of ScopeIds records. */
        public ?array $items = null,
        /** The message of sites add to site-collection operation. */
        public ?string $message = null,
        /** sites add to site-collection operation status. */
        public ?string $status = null,
    ) {}
}
