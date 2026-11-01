<?php

namespace spkm\ArubaCentral\Central\Data\Troubleshooting;

use spkm\ArubaCentral\Data\Data;

/**
 * A SubscriptionResp record.
 */
readonly class SubscriptionResp extends Data
{
    /**
     * @param  array<mixed>|null  $subscribeList
     */
    public function __construct(
        /** Overall status of the subscription request (Success/Error) */
        public ?string $status = null,
        /** Description of the overall subscription status */
        public ?string $description = null,
        /** List of device subscription results */
        public ?array $subscribeList = null,
    ) {}
}
