<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A ExpiringLicensePerMonth record.
 */
readonly class ExpiringLicensePerMonth extends Data
{
    public function __construct(
        /** Sequence number of the month (1-12). */
        public ?int $sequence = null,
        /** Month name in uppercase (e.g. FEBRUARY). */
        public ?string $month = null,
        /** Year (e.g. 2026). */
        public ?int $year = null,
        /** Combined month-year label in uppercase (e.g. FEBRUARY-2026). */
        public ?string $monthYear = null,
        /** Total Foundation tier subscriptions expiring this month. */
        public ?int $foundationExpCount = null,
        /** Total Advanced tier subscriptions expiring this month. */
        public ?int $advancedExpCount = null,
        /** Total Other tier subscriptions expiring this month. */
        public ?int $otherExpCount = null,
        /** Foundation subscriptions expiring for Access Points. */
        public ?int $foundationExpCountAp = null,
        /** Foundation subscriptions expiring for Switches. */
        public ?int $foundationExpCountSw = null,
        /** Foundation subscriptions expiring for Gateways. */
        public ?int $foundationExpCountGw = null,
        /** Foundation subscriptions expiring for Other device types. */
        public ?int $foundationExpCountOt = null,
        /** Advanced subscriptions expiring for Access Points. */
        public ?int $advancedExpCountAp = null,
        /** Advanced subscriptions expiring for Switches. */
        public ?int $advancedExpCountSw = null,
        /** Advanced subscriptions expiring for Gateways. */
        public ?int $advancedExpCountGw = null,
        /** Advanced subscriptions expiring for Other device types. */
        public ?int $advancedExpCountOt = null,
        /** Other tier subscriptions expiring for Access Points. */
        public ?int $otherExpCountAp = null,
        /** Other tier subscriptions expiring for Switches. */
        public ?int $otherExpCountSw = null,
        /** Other tier subscriptions expiring for Gateways. */
        public ?int $otherExpCountGw = null,
        /** Other tier subscriptions expiring for Other device types. */
        public ?int $otherExpCountOt = null,
    ) {}
}
