<?php

namespace spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions;

use spkm\ArubaCentral\Classic\Data\Licensing\SubscriptionResponseItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get user subscription keys: GET /platform/licensing/v1/subscriptions.
 *
 * Query parameters: license_type, subscription_key, device_type.
 */
class GetUserSubscriptionsRequest extends ListRequest
{
    protected ?string $dto = SubscriptionResponseItem::class;

    public string $resultKey = 'subscriptions';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/licensing/v1/subscriptions';
    }
}
