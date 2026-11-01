<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A ServiceCfg record.
 */
readonly class ServiceCfg extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Schedule */
        public ?bool $schedule = null,
        /** Hour for deployement */
        public ?int $deploy_hour = null,
        /** Quality Thrsold Value */
        public ?int $quality_threshold = null,
        /** Feasibility Update Thereshold Value */
        public ?int $solv_feas_threshold = null,
        /** 5GHz offset set by the User */
        public ?int $eirp_5g_offset = null,
        /** 2.4GHz offset set by the user */
        public ?int $eirp_2g_offset = null,
    ) {}
}
