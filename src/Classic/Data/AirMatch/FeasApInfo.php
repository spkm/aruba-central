<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A FeasApInfo record.
 */
readonly class FeasApInfo extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Timestamp */
        public ?int $timestamp = null,
        /** AP MAC address */
        public ?string $ap_eth_mac = null,
        /** AP Serial Number */
        public ?string $ap_serial = null,
        /** Model Name of AP */
        public ?string $ap_model = null,
        /** Current Operation Mode of AP */
        public ?string $cur_opmode = null,
        /** Identifies if AP is currently Down */
        public ?bool $ap_down = null,
        /** Identifies if AP is currently disabled */
        public ?bool $ap_remove = null,
        /** Current DRT version */
        public ?string $ap_drt = null,
        /** Current Country */
        public ?string $ap_country = null,
    ) {}
}
