<?php

namespace spkm\ArubaCentral\Classic\Data\Rapids;

use spkm\ArubaCentral\Data\Data;

/**
 * A InfrastructureAttack record.
 */
readonly class InfrastructureAttack extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Attacking station MAC address */
        public ?string $macaddr = null,
        /** Infrastructure attack type */
        public ?string $attack_type = null,
        /** AP that detected the infrastructure attack */
        public ?string $detected_ap = null,
        /** Timestamp at which this infrastructure attack detected last */
        public ?int $detected_time = null,
    ) {}
}
