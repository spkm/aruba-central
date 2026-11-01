<?php

namespace spkm\ArubaCentral\Classic\Data\Licensing;

use spkm\ArubaCentral\Data\Data;

/**
 * A SubscriptionResponseItem record.
 */
readonly class SubscriptionResponseItem extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** subscription key. */
        public ?string $subscription_key = null,
        /** sku of subscription key. */
        public ?string $sku = null,
        /** subscription start date. */
        public ?int $start_date = null,
        /** subscription expiry date. */
        public ?int $end_date = null,
        /** Total quantity associated with the subscription key. */
        public ?int $quantity = null,
        /** Total available quantity associated with the subscription key. */
        public ?int $available = null,
        /** Current state of subscription. One of: ACTIVE, EXPIRING_SOON, UNDER_GRACE_PERIOD, EXPIRED. */
        public ?string $status = null,
    ) {}
}
