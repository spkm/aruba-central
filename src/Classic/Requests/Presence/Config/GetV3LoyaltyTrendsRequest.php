<?php

namespace spkm\ArubaCentral\Classic\Requests\Presence\Config;

use spkm\ArubaCentral\Classic\Data\Presence\LoyaltyDataPoints;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get presence analytics trends.: GET /presence/v3/analytics/trends/loyal_visitors.
 *
 * Query parameters (* required): tag_id, start_time*, end_time*, sample_frequency.
 */
class GetV3LoyaltyTrendsRequest extends ListRequest
{
    protected ?string $dto = LoyaltyDataPoints::class;

    public string $resultKey = '';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/presence/v3/analytics/trends/loyal_visitors';
    }
}
