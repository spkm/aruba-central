<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A SwitchHardware record.
 */
readonly class SwitchHardware extends Data
{
    /**
     * @param  array<mixed>|null  $cpu
     * @param  array<mixed>|null  $memory
     * @param  array<mixed>|null  $temperature
     * @param  array<mixed>|null  $fans
     * @param  array<mixed>|null  $powerSupplies
     * @param  array<mixed>|null  $poeSlots
     */
    public function __construct(
        /** Serial of the switch. */
        public ?string $id = null,
        /** Type of the hardware. */
        public ?string $type = null,
        /** Serial of the switch. */
        public ?string $serialNumber = null,
        /** Model of the switch. */
        public ?string $model = null,
        /** Role of the switch. */
        public ?string $role = null,
        public ?array $cpu = null,
        public ?array $memory = null,
        public ?array $temperature = null,
        public ?array $fans = null,
        public ?array $powerSupplies = null,
        public ?array $poeSlots = null,
        /** Member id of the switch. */
        public ?int $stackMemberId = null,
        /** Status of the switch. */
        public ?string $status = null,
    ) {}
}
