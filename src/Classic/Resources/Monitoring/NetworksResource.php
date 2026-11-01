<?php

namespace spkm\ArubaCentral\Classic\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Monitoring\Bandwidth;
use spkm\ArubaCentral\Classic\Data\Monitoring\NetworkRecord;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Network\GetNetworkRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Network\GetNetworksBandwidthUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Network\GetNetworksRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Network API, from Aruba::monitoring()->networks().
 *
 * @extends Builder<NetworkRecord>
 */
class NetworksResource extends Builder
{
    protected string $idField = 'networkName';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, NetworkRecord::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetNetworksRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetNetworkRequest((string) $id);
    }

    /**
     * WLAN Network Bandwidth usage: GET /monitoring/v2/networks/bandwidth_usage.
     *
     * @return ListResource<Bandwidth>
     */
    public function bandwidthUsage(): ListResource
    {
        return new ListResource($this->connector, Bandwidth::class, fn (Query $query) => new GetNetworksBandwidthUsageRequest($query));
    }
}
