<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A ChassisInfo record.
 */
readonly class ChassisInfo extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $power_supplies
     * @param  array<mixed>|null  $mgmt_mods
     * @param  array<mixed>|null  $mgmt_port
     * @param  array<mixed>|null  $slots
     */
    public function __construct(
        /** Power supply status(es). A list of PowerSupply records. */
        public ?array $power_supplies = null,
        /** Management module status(es). A list of MgmtModule records. */
        public ?array $mgmt_mods = null,
        /** Management port details. A list of ManagementPort records. */
        public ?array $mgmt_port = null,
        /** Blade information. A list of SlotInfo records. */
        public ?array $slots = null,
    ) {}
}
