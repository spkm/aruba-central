<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A Optimization record.
 */
readonly class Optimization extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $result
     * @param  array<mixed>|null  $opmode
     * @param  array<mixed>|null  $scope
     * @param  array<mixed>|null  $subnetwork
     */
    public function __construct(
        /** Sequence Number */
        public ?int $seq = null,
        /** Optimization Time */
        public ?int $opt_time = null,
        /** Start Time */
        public ?int $start_time = null,
        /** Deployment Time */
        public ?int $deploy_time = null,
        /** Number of Radio */
        public ?int $num_radio = null,
        /** Result A list of radio_result records. */
        public ?array $result = null,
        /** Estimated Optimization Time */
        public ?int $est_opt_time = null,
        /** Quality Threshold */
        public ?int $quality_threshold = null,
        public ?int $runmode = null,
        /** Number of APs */
        public ?int $num_ap = null,
        /** Stop Time */
        public ?int $stop_time = null,
        /** Keys: num_dual_5g_auto_capable, num_dual_5g_capable, is_computed, is_deployed. */
        public ?array $opmode = null,
        /** Timestamp */
        public ?int $timestamp = null,
        /** Scope A list of scope records. */
        public ?array $scope = null,
        /** Subnetwork A list of subnetwork records. */
        public ?array $subnetwork = null,
    ) {}
}
