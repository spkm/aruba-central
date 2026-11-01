<?php

namespace spkm\ArubaCentral\Classic\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Monitoring\Swarm;
use spkm\ArubaCentral\Classic\Data\Monitoring\TopNSwarm;
use spkm\ArubaCentral\Classic\Data\Monitoring\TopNSwarmClients;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Swarm\GetSwarmRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Swarm\GetSwarmsBandwidthUsageTopnRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Swarm\GetSwarmsClientsCountTopnRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Swarm\GetSwarmsRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Swarm API, from Aruba::monitoring()->swarms().
 *
 * @extends Builder<Swarm>
 */
class SwarmsResource extends Builder
{
    protected string $idField = 'swarmId';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, Swarm::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSwarmsRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetSwarmRequest((string) $id);
    }

    /**
     * Top N Swarms By Bandwidth Usage: GET /monitoring/v1/swarms/bandwidth_usage/topn.
     *
     * @return ListResource<TopNSwarm>
     */
    public function topByBandwidth(): ListResource
    {
        return new ListResource($this->connector, TopNSwarm::class, fn (Query $query) => new GetSwarmsBandwidthUsageTopnRequest($query));
    }

    /**
     * Top N Swarms By Clients Count: GET /monitoring/v1/swarms/clients_count/topn.
     *
     * @return ListResource<TopNSwarmClients>
     */
    public function topByClientCount(): ListResource
    {
        return new ListResource($this->connector, TopNSwarmClients::class, fn (Query $query) => new GetSwarmsClientsCountTopnRequest($query));
    }
}
