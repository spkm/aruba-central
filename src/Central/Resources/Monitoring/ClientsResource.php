<?php

namespace spkm\ArubaCentral\Central\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Monitoring\Client;
use spkm\ArubaCentral\Central\Data\Monitoring\GetClientsTrends;
use spkm\ArubaCentral\Central\Data\Monitoring\GetClientsUsage;
use spkm\ArubaCentral\Central\Data\Monitoring\GetTopNClientsByUsageItem;
use spkm\ArubaCentral\Central\Data\Monitoring\MobilityDetails;
use spkm\ArubaCentral\Central\Requests\Monitoring\Clients\GetClientDetailsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Clients\GetClientMobilityDetailsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Clients\GetClientsTrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Clients\GetClientsUsageRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Clients\GetTopNClientsByUsageRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Clients\ListUnifiedClientsRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Clients API, from Aruba::clients().
 *
 * @extends Builder<Client>
 */
class ClientsResource extends Builder
{
    protected string $idField = 'macAddress';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, Client::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ListUnifiedClientsRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetClientDetailsRequest((string) $id);
    }

    /**
     * Get Wireless Client Mobility Details: GET /network-monitoring/v1/clients/{mac-address}/mobility-trail.
     *
     * @return ListResource<MobilityDetails>
     */
    public function mobilityTrail(string $macAddress): ListResource
    {
        return new ListResource($this->connector, MobilityDetails::class, fn (Query $query) => new GetClientMobilityDetailsRequest($macAddress, $query));
    }

    /**
     * Get Clients Trend: GET /network-monitoring/v1/clients-trend.
     *
     * @param  array<string, mixed>  $options
     */
    public function trends(array $options = []): ?GetClientsTrends
    {
        return $this->fetch(new GetClientsTrendsRequest($options));
    }

    /**
     * Get Clients Usage: GET /network-monitoring/v1/clients-usage.
     *
     * @param  array<string, mixed>  $options
     */
    public function usage(array $options = []): ?GetClientsUsage
    {
        return $this->fetch(new GetClientsUsageRequest($options));
    }

    /**
     * Get Top N Clients By Usage: GET /network-monitoring/v1/clients-topn-usage.
     *
     * @return ListResource<GetTopNClientsByUsageItem>
     */
    public function topByUsage(): ListResource
    {
        return new ListResource($this->connector, GetTopNClientsByUsageItem::class, fn (Query $query) => new GetTopNClientsByUsageRequest($query));
    }
}
