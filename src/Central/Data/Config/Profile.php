<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A configuration profile of any type: a named record whose other fields are the type's own, kept in $extra under
 * Central's kebab-case keys and sent back the same way.
 */
readonly class Profile extends Data
{
    protected const EXTRA = true;

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        /** The profile's name, which is its id. */
        public ?string $name = null,
        /** A description of the profile. */
        public ?string $description = null,
        /** The type's other fields, under Central's own keys. */
        public array $extra = [],
    ) {}
}
