<?php

namespace spkm\ArubaCentral\Classic\Data\NetworkHealth;

use spkm\ArubaCentral\Data\Data;

/**
 * A Site record.
 */
readonly class Site extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Id of the Site */
        public ?string $id = null,
        /** Name of the Site */
        public ?string $name = null,
        /** Relevance Score */
        public ?int $score = null,
        /** Number of down devices */
        public ?int $device_down = null,
        /** Number of up devices */
        public ?int $device_up = null,
        /** Number of devices with high memory utilization */
        public ?int $device_high_mem = null,
        /** Number of devices with high cpu utilization */
        public ?int $device_high_cpu = null,
        /** Number of APs having high channel utilization for 2.4GHz band */
        public ?int $device_high_ch_2_4ghz = null,
        /** Number of APs having high channel utilization for 5GHz band */
        public ?int $device_high_ch_5ghz = null,
        /** Number of APs having high RF noise for 2.4GHz band */
        public ?int $device_high_noise_2_4ghz = null,
        /** Number of APs having high RF noise for 5GHz band */
        public ?int $device_high_noise_5ghz = null,
        /** Number of down uplinks */
        public ?int $wan_uplinks_down = null,
        /** Number of down tunnels */
        public ?int $wan_tunnels_down = null,
        /** User connectivity health score for WLAN clients */
        public ?int $user_conn_health_score = null,
    ) {}
}
