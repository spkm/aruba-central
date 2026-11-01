<?php

namespace spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions;

use spkm\ArubaCentral\Classic\Data\Licensing\SubscriptionStatsData;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get subscription stats: GET /platform/licensing/v1/subscriptions/stats.
 *
 * Query options: license_type, service, app_only_stats.
 */
class GetSubscriptionStatsRequest extends ItemRequest
{
    protected ?string $dto = SubscriptionStatsData::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/licensing/v1/subscriptions/stats';
    }
}
