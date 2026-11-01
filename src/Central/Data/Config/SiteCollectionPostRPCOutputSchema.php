<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A SiteCollectionPostRPCOutputSchema record.
 */
readonly class SiteCollectionPostRPCOutputSchema extends Data
{
    /**
     * @param  array<mixed>|null  $items
     */
    public function __construct(
        /** The return code of site-collection create operation. */
        public ?string $code = null,
        /** A list of ScopeIds records. */
        public ?array $items = null,
        /** The message of site-collection create operation. */
        public ?string $message = null,
        /** Site-Collection Create operation status. */
        public ?string $status = null,
    ) {}
}
