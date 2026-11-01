<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A CXPortPoeInfo record.
 */
readonly class CXPortPoeInfo extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $data
     */
    public function __construct(
        /** Keys: poe_slots, plc_power_class_type, dlc_power_class_type, poe_priority, pre_standard_detect, alloc_by_config, alloc_by_actual, cutoff_power, port_configured_type, poe_value…. */
        public ?array $data = null,
    ) {}
}
