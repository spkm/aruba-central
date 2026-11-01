<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Client;

use spkm\ArubaCentral\Classic\Data\Monitoring\TopNClient;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Top N Clients: GET /monitoring/v1/clients/bandwidth_usage/topn.
 *
 * Query parameters: group, swarm_id, label, network, cluster_id, stack_id, count, from_timestamp, to_timestamp.
 */
class GetClientsBandwidthUsageTopnRequest extends ListRequest
{
    protected ?string $dto = TopNClient::class;

    public string $resultKey = 'clients';

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
        return '/monitoring/v1/clients/bandwidth_usage/topn';
    }
}
