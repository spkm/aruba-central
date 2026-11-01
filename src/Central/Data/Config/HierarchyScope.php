<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A scope in the configuration hierarchy: the organisation, a site collection, a site, a device group or a device.
 */
readonly class HierarchyScope extends Data
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
        /** The scope identifier. */
        public ?string $scopeId = null,
        /** Name of the scope. */
        public ?string $scopeName = null,
        /** One of org, site-collection, site, device-groups or device. */
        public ?string $scopeType = null,
        /** Further fields Central sends, under its own keys. */
        public array $extra = [],
    ) {}
}
