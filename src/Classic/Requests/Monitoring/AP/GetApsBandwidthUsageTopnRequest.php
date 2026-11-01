<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\AP;

use spkm\ArubaCentral\Classic\Data\Monitoring\TopNAp;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Top N AP Details: GET /monitoring/v2/aps/bandwidth_usage/topn.
 *
 * Query parameters: group, swarm_id, label, site, cluster_id, count, from_timestamp, to_timestamp.
 */
class GetApsBandwidthUsageTopnRequest extends ListRequest
{
    protected ?string $dto = TopNAp::class;

    public string $resultKey = 'aps';

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
        return '/monitoring/v2/aps/bandwidth_usage/topn';
    }
}
