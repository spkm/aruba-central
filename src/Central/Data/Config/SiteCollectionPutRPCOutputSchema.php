<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A SiteCollectionPutRPCOutputSchema record.
 */
readonly class SiteCollectionPutRPCOutputSchema extends Data
{
    /**
     * @param  array<mixed>|null  $items
     */
    public function __construct(
        /** The return code of site-collection update operation. */
        public ?string $code = null,
        /** A list of ScopeIds records. */
        public ?array $items = null,
        /** The message of site-collection update operation. */
        public ?string $message = null,
        /** Site-Collection Update operation status. */
        public ?string $status = null,
    ) {}
}
