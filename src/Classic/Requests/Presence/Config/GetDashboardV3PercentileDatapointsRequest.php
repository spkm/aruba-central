<?php

namespace spkm\ArubaCentral\Classic\Requests\Presence\Config;

use spkm\ArubaCentral\Classic\Data\Presence\DataPointsV3Item;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get presence analytics trends.: GET /presence/v3/analytics/trends/passerby_visitors.
 *
 * Query parameters (* required): tag_id, category*, start_time*, end_time*, sample_frequency.
 */
class GetDashboardV3PercentileDatapointsRequest extends ListRequest
{
    protected ?string $dto = DataPointsV3Item::class;

    public string $resultKey = 'datapoints';

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
        return '/presence/v3/analytics/trends/passerby_visitors';
    }
}
