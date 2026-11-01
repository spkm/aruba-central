<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A site collection in the configuration hierarchy.
 */
readonly class SiteCollection extends Data
{
    protected const EXTRA = true;

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
        /** The collection's scope identifier. */
        public ?string $scopeId = null,
        /** Name of the collection. */
        public ?string $scopeName = null,
        /** Number of sites in the collection. */
        public ?int $siteCount = null,
        /** Number of devices in the collection. */
        public ?int $deviceCount = null,
        /** Further fields Central sends, under its own keys. */
        public array $extra = [],
    ) {}
}
