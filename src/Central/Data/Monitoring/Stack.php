<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A Stack record.
 */
readonly class Stack extends Data
{
    /**
     * @param  array<mixed>|null  $members
     * @param  array<mixed>|null  $portLinks
     */
    public function __construct(
        /** Unique identifier for the stack. */
        public ?string $id = null,
        /** Type of the stack. */
        public ?string $type = null,
        /** Topology of the stack. */
        public ?string $topology = null,
        /** Type of the stack configuration. */
        public ?string $stackType = null,
        /** List of switches that are members of the stack. */
        public ?array $members = null,
        /** Port links within the stack. */
        public ?array $portLinks = null,
    ) {}
}
