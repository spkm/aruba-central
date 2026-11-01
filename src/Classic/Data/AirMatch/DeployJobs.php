<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A DeployJobs record.
 */
readonly class DeployJobs extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Frequency Band */
        public ?string $band = null,
        /** Time(in hour) at which solution will be deployed */
        public ?int $deploy_hour = null,
        /** Partition ID */
        public ?int $partition_id = null,
        public ?int $rfd_id = null,
        public ?int $score = null,
        /** Tenant ID */
        public ?string $tenant_id = null,
    ) {}
}
