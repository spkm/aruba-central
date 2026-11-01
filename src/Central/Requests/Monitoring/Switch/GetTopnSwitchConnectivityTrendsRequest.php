<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Central\Data\Monitoring\TopnInterfaceTrends;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get Top-N Switch interface trends: GET /network-monitoring/v1/switches/topn-interface-trends.
 *
 * Query parameters: site-id, filter.
 */
class GetTopnSwitchConnectivityTrendsRequest extends ListRequest
{
    protected ?string $dto = TopnInterfaceTrends::class;

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
        return '/network-monitoring/v1/switches/topn-interface-trends';
    }
}
