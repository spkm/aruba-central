<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A SwitchLagSummary record.
 */
readonly class SwitchLagSummary extends Data
{
    /**
     * @param  array<mixed>|null  $ports
     */
    public function __construct(
        /** Lag name. */
        public ?string $id = null,
        /** Type of the switch. */
        public ?string $type = null,
        /** Lag name. */
        public ?string $name = null,
        /** Count of the interfaces with lag. */
        public ?int $count = null,
        /** Names of the switch interface. */
        public ?array $ports = null,
    ) {}
}
