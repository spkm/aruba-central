<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A ApInfo record.
 */
readonly class ApInfo extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Timestamp */
        public ?int $timestamp = null,
        /** AP MAC address */
        public ?string $ap_eth_mac = null,
        /** AP Serial Number */
        public ?string $ap_serial = null,
        /** Name of AP */
        public ?string $ap_name = null,
        /** IPv4 address of AP */
        public ?string $ip_addr = null,
        /** IPv6 address of AP */
        public ?string $ip_addr6 = null,
        /** Model Name of AP */
        public ?string $ap_model = null,
        /** Time for which AP is running */
        public ?int $ap_uptime = null,
        /** Current Operation Mode of AP */
        public ?string $cur_opmode = null,
        /** Identifies if AP is currently Down */
        public ?bool $ap_down = null,
        /** Identifies if AP is currently disabled */
        public ?bool $ap_remove = null,
    ) {}
}
