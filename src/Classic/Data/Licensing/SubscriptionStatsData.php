<?php

namespace spkm\ArubaCentral\Classic\Data\Licensing;

use spkm\ArubaCentral\Data\Data;

/**
 * A SubscriptionStatsData record.
 */
readonly class SubscriptionStatsData extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $license_usage_by_services
     */
    public function __construct(
        /** available subscription quantity. */
        public ?int $available = null,
        /** total subscription quantity. */
        public ?int $total = null,
        /** subscription quantity about to expire. */
        public ?int $expiring = null,
        /** used subscription quantity. */
        public ?int $used = null,
        /** service_name: int64 */
        public ?array $license_usage_by_services = null,
    ) {}
}
