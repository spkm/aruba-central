<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A RadioPlan record.
 */
readonly class RadioPlan extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Radio Plan Timestamp */
        public ?int $timestamp = null,
        /** Radio MAC Address */
        public ?string $radio_mac = null,
        /** Radio Channel */
        public ?int $channel = null,
        /** Secondary Channel Frequancy Segment */
        public ?int $secondary_freq_segment = null,
        /** Frequency Band */
        public ?string $band = null,
        /** Channel Bandwidth */
        public ?string $bandwidth = null,
        /** Effective Radiated Power */
        public ?int $eirp = null,
        /** Effective Radiated Power value in dbm */
        public ?int $eirp_dbm = null,
        /** Ap Name */
        public ?string $ap_name = null,
        /** AP Model */
        public ?string $ap_model = null,
        /** Channel Duration */
        public ?int $chan_time = null,
        /** EIRP Duration */
        public ?int $eirp_time = null,
        /** Number of Retries */
        public ?int $retries = null,
        public ?int $confirm_time = null,
        public ?int $eirp_opti = null,
        public ?int $chan_opti = null,
        /** If There is frozen EIRP */
        public ?bool $eirp_frozen = null,
        /** If the Channel is frozen */
        public ?bool $chan_frozen = null,
        /** If the Channel bandwidth is frozen */
        public ?bool $cbw_frozen = null,
    ) {}
}
