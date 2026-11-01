<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Swarm;

use spkm\ArubaCentral\Classic\Data\Monitoring\TopNSwarm;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Top N Swarms By Bandwidth Usage: GET /monitoring/v1/swarms/bandwidth_usage/topn.
 *
 * Query parameters: group, count, from_timestamp, to_timestamp.
 */
class GetSwarmsBandwidthUsageTopnRequest extends ListRequest
{
    protected ?string $dto = TopNSwarm::class;

    public string $resultKey = 'swarms';

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
        return '/monitoring/v1/swarms/bandwidth_usage/topn';
    }
}
