<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A WallTypesItem record.
 */
readonly class WallTypesItem extends Data
{
    public function __construct(
        /** walltype ID associated with the customer in UUID format. */
        public ?string $id = null,
        /** walltype name associated with the customer in readable format. */
        public ?string $name = null,
        /** code associated with the walltypes in readable format. */
        public ?string $code = null,
        /** attenuation associated with the walltypes. */
        public ?float $attenuation = null,
        /** One of: STANDARD, CUSTOM. */
        public ?string $type = null,
    ) {}
}
