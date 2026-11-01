<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A RadioProfile record.
 */
readonly class RadioProfile extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $ch_bw_range
     */
    public function __construct(
        public ?string $allowed_channels = null,
        public ?int $beacon_interval = null,
        public ?array $ch_bw_range = null,
        public ?int $csa_count = null,
        public ?string $disable_arm_wids_functions = null,
        public ?bool $dot11h = null,
        public ?int $high_noise_backoff_time = null,
        public ?int $interference_immunity = null,
        public ?bool $legacy_mode = null,
        public ?int $max_tx_power = null,
        public ?string $max_tx_power_ai = null,
        public ?int $min_tx_power = null,
        public ?string $min_tx_power_ai = null,
        public ?string $name = null,
        public ?bool $scanning_disable = null,
        public ?bool $smart_antenna = null,
        public ?bool $spectrum_monitor = null,
        public ?string $zone = null,
    ) {}
}
