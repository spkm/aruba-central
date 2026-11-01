<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A Neighbours record.
 */
readonly class Neighbours extends Data
{
    /**
     * @param  array<mixed>|null  $neighbours
     */
    public function __construct(
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** Type of topology or connection data */
        public ?string $type = null,
        /** List of neighbouring devices linked to the given device */
        public ?array $neighbours = null,
    ) {}
}
