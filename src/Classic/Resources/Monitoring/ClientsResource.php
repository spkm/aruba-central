<?php

namespace spkm\ArubaCentral\Classic\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Monitoring\Bandwidth;
use spkm\ArubaCentral\Classic\Data\Monitoring\Client;
use spkm\ArubaCentral\Classic\Data\Monitoring\ClientCount;
use spkm\ArubaCentral\Classic\Data\Monitoring\ClientDetail;
use spkm\ArubaCentral\Classic\Data\Monitoring\ClientMobilityTrailDetail;
use spkm\ArubaCentral\Classic\Data\Monitoring\TopNClient;
use spkm\ArubaCentral\Classic\Data\Monitoring\UnifiedClient;
use spkm\ArubaCentral\Classic\Data\Monitoring\WiredClient;
use spkm\ArubaCentral\Classic\Data\Monitoring\WiredClientDetail;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Client\GetClientsBandwidthUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Client\GetClientsBandwidthUsageTopnRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Client\GetClientsCountRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Client\GetV2UnifiedClientDetailRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Client\GetV2UnifiedClientsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Client\GetWiredClientRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Client\GetWiredClientsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Client\GetWirelessClientMobilityRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Client\GetWirelessClientRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Client\GetWirelessClientsRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Client API, from Aruba::monitoring()->clients().
 *
 * @extends Builder<UnifiedClient>
 */
class ClientsResource extends Builder
{
    protected string $idField = 'macaddr';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, UnifiedClient::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetV2UnifiedClientsRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetV2UnifiedClientDetailRequest((string) $id);
    }

    /**
     * Client Bandwidth Usage: GET /monitoring/v1/clients/bandwidth_usage.
     *
     * @return ListResource<Bandwidth>
     */
    public function bandwidthUsage(): ListResource
    {
        return new ListResource($this->connector, Bandwidth::class, fn (Query $query) => new GetClientsBandwidthUsageRequest($query));
    }

    /**
     * Top N Clients: GET /monitoring/v1/clients/bandwidth_usage/topn.
     *
     * @return ListResource<TopNClient>
     */
    public function topByBandwidth(): ListResource
    {
        return new ListResource($this->connector, TopNClient::class, fn (Query $query) => new GetClientsBandwidthUsageTopnRequest($query));
    }

    /**
     * Total Clients Count: GET /monitoring/v1/clients/count.
     *
     * @return ListResource<ClientCount>
     */
    public function countTrend(): ListResource
    {
        return new ListResource($this->connector, ClientCount::class, fn (Query $query) => new GetClientsCountRequest($query));
    }

    /**
     * Connected Wired Client Details: GET /monitoring/v1/clients/wired/{macaddr}.
     *
     * @param  array<string, mixed>  $options
     */
    public function wiredClient(string $macaddr, array $options = []): ?WiredClientDetail
    {
        return $this->fetch(new GetWiredClientRequest($macaddr, $options));
    }

    /**
     * List Connected Wired Clients: GET /monitoring/v1/clients/wired.
     *
     * @return ListResource<WiredClient>
     */
    public function wired(): ListResource
    {
        return new ListResource($this->connector, WiredClient::class, fn (Query $query) => new GetWiredClientsRequest($query));
    }

    /**
     * Connected Wireless Client Details: GET /monitoring/v1/clients/wireless/{macaddr}.
     *
     * @param  array<string, mixed>  $options
     */
    public function wirelessClient(string $macaddr, array $options = []): ?ClientDetail
    {
        return $this->fetch(new GetWirelessClientRequest($macaddr, $options));
    }

    /**
     * Wireless Client Mobility Trail: GET /monitoring/v1/clients/wireless/{macaddr}/mobility_trail.
     *
     * @return ListResource<ClientMobilityTrailDetail>
     */
    public function mobilityTrail(string $macaddr): ListResource
    {
        return new ListResource($this->connector, ClientMobilityTrailDetail::class, fn (Query $query) => new GetWirelessClientMobilityRequest($macaddr, $query));
    }

    /**
     * List Connected Wireless Clients: GET /monitoring/v1/clients/wireless.
     *
     * @return ListResource<Client>
     */
    public function wireless(): ListResource
    {
        return new ListResource($this->connector, Client::class, fn (Query $query) => new GetWirelessClientsRequest($query));
    }
}
