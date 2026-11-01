<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Swarm;

use spkm\ArubaCentral\Classic\Data\Monitoring\TopNSwarmClients;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Top N Swarms By Clients Count: GET /monitoring/v1/swarms/clients_count/topn.
 *
 * Query parameters: group, count, from_timestamp, to_timestamp, sort.
 */
class GetSwarmsClientsCountTopnRequest extends ListRequest
{
    protected ?string $dto = TopNSwarmClients::class;

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
        return '/monitoring/v1/swarms/clients_count/topn';
    }
}
