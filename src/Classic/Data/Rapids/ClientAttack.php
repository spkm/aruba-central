<?php

namespace spkm\ArubaCentral\Classic\Data\Rapids;

use spkm\ArubaCentral\Data\Data;

/**
 * A ClientAttack record.
 */
readonly class ClientAttack extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Attacking station MAC address */
        public ?string $macaddr = null,
        /** Client attack type */
        public ?string $attack_type = null,
        /** AP that detected the client attack */
        public ?string $detected_ap = null,
        /** Timestamp at which this client attack detected last */
        public ?int $detected_time = null,
    ) {}
}
