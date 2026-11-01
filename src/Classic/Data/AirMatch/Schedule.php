<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A Schedule record.
 */
readonly class Schedule extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $tenant_timezones
     * @param  array<mixed>|null  $job_list
     * @param  array<mixed>|null  $tenant_tz_deploy_hr_list
     */
    public function __construct(
        /** Timezone on Cloud */
        public ?string $cloud_tzstr = null,
        /** Schedule Creation Time */
        public ?int $creation_time = null,
        /** Tenant Timezones A list of tenant_tz_dict records. */
        public ?array $tenant_timezones = null,
        /** Time (in hour) at which soltion is deployed on cloud */
        public ?int $cloud_deploy_hr = null,
        /** List of all the jobs A list of job records. */
        public ?array $job_list = null,
        /** A list of tenant_tz_deploy_hr_dict records. */
        public ?array $tenant_tz_deploy_hr_list = null,
    ) {}
}
