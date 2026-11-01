<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A TenantTzDeployHrDict record.
 */
readonly class TenantTzDeployHrDict extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $tz_list
     * @param  array<mixed>|null  $deploy_hr_list
     */
    public function __construct(
        /** Tenant ID */
        public ?string $tenant_id = null,
        /** List of Timezones */
        public ?array $tz_list = null,
        /** List of all times(in hour) when solution is deployed */
        public ?array $deploy_hr_list = null,
    ) {}
}
