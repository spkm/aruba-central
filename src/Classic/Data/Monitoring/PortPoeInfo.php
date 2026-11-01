<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A PortPoeInfo record.
 */
readonly class PortPoeInfo extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $data
     */
    public function __construct(
        /** Keys: plc_power_class_type, dlc_power_class_type, poe_priority, pre_standard_detect, alloc_by_config, alloc_by_actual, port_configured_type, poe_value, med_lldp_detect_status, pse_configured_tlv…. */
        public ?array $data = null,
    ) {}
}
