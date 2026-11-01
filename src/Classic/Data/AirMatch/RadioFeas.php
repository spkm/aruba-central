<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A RadioFeas record.
 */
readonly class RadioFeas extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $configured_opmodes
     * @param  array<mixed>|null  $feasible_opmodes
     * @param  array<mixed>|null  $opmode_feas_dict
     * @param  array<mixed>|null  $supported_opmodes
     */
    public function __construct(
        /** Radio MAC Address */
        public ?string $radio_mac = null,
        public ?array $configured_opmodes = null,
        /** Current Operation Mode */
        public ?string $cur_opmode = null,
        /** Feasible Operation Modes */
        public ?array $feasible_opmodes = null,
        /** Radio MAC Address */
        public ?string $mac = null,
        /** Keys: DUAL_5G, DUAL_BAND. */
        public ?array $opmode_feas_dict = null,
        public ?array $supported_opmodes = null,
        /** Timestamp */
        public ?int $timestamp = null,
    ) {}
}
