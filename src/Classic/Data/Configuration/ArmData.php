<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A ArmData record.
 */
readonly class ArmData extends Data
{
    protected const DATE_FORMAT = 'U';

    protected const ALIASES = ['_80mhz_support' => '80mhz_support'];

    public function __construct(
        public ?bool $_80mhz_support = null,
        public ?string $a_channels = null,
        public ?string $air_time_fairness_mode = null,
        public ?int $backoff_time = null,
        public ?string $band_steering_mode = null,
        public ?bool $client_aware = null,
        public ?bool $client_match = null,
        public ?int $cm_calc_interval = null,
        public ?int $cm_calc_threshold = null,
        public ?int $cm_holdtime = null,
        public ?string $cm_key = null,
        public ?int $cm_match_debug = null,
        public ?int $cm_max_adaption = null,
        public ?int $cm_max_request = null,
        public ?int $cm_nb_matching = null,
        public ?int $cm_slb_mode = null,
        public ?int $error_rate_threshold = null,
        public ?int $error_rate_wait_time = null,
        public ?string $g_channels = null,
        public ?string $max_tx_power = null,
        public ?string $min_tx_power = null,
        public ?bool $rf_channel_quality_aware_arm_disable = null,
        public ?int $rf_channel_quality_threshold = null,
        public ?int $rf_channel_quality_wait_time = null,
        public ?int $rf_free_channel_index = null,
        public ?int $rf_ideal_coverage_index = null,
        public ?bool $scanning = null,
        public ?bool $spectrum_lb = null,
        public ?string $wide_bands = null,
    ) {}
}
