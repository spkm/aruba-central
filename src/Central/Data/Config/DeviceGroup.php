<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A device group in the configuration hierarchy.
 */
readonly class DeviceGroup extends Data
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
        /** The group's scope identifier. */
        public ?string $scopeId = null,
        /** Name of the group. */
        public ?string $scopeName = null,
        /** Number of devices in the group. */
        public ?int $deviceCount = null,
        /** Further fields Central sends, under its own keys. */
        public array $extra = [],
    ) {}
}
