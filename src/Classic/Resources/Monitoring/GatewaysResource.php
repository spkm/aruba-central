<?php

namespace spkm\ArubaCentral\Classic\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Monitoring\Bandwidth;
use spkm\ArubaCentral\Classic\Data\Monitoring\DHCPClientInfo;
use spkm\ArubaCentral\Classic\Data\Monitoring\DHCPPoolInfo;
use spkm\ArubaCentral\Classic\Data\Monitoring\GatewayPortErrors;
use spkm\ArubaCentral\Classic\Data\Monitoring\GatewayVLANInfoItem;
use spkm\ArubaCentral\Classic\Data\Monitoring\MC;
use spkm\ArubaCentral\Classic\Data\Monitoring\PortDetail;
use spkm\ArubaCentral\Classic\Data\Monitoring\TunnelDetail;
use spkm\ArubaCentral\Classic\Data\Monitoring\Uplink;
use spkm\ArubaCentral\Classic\Data\Monitoring\UplinksDistribution;
use spkm\ArubaCentral\Classic\Data\Monitoring\WANCompressionStats;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\DeleteGatewayRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayDhcpClientsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayDhcpPoolsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayPortErrorsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayPortsBandwidthUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayPortsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewaysRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayTunnelsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayUplinksBandwidthUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayUplinksDetailRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayUplinksDistributionRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayUplinksTunnelStatsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayUplinksWanCompressionUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayVlanInfoRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Gateway API, from Aruba::monitoring()->gateways().
 *
 * @extends Builder<MC>
 */
class GatewaysResource extends Builder
{
    protected string $idField = 'serial';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, MC::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetGatewaysRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetGatewayRequest((string) $id);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteGatewayRequest((string) $id, $options);
    }

    /**
     * Gateway DHCP Clients information: GET /monitoring/v1/gateways/{serial}/dhcp_clients.
     *
     * @return ListResource<DHCPClientInfo>
     */
    public function getGatewayDhcpClients(string $serial): ListResource
    {
        return new ListResource($this->connector, DHCPClientInfo::class, fn (Query $query) => new GetGatewayDhcpClientsRequest($serial, $query));
    }

    /**
     * Gateway DHCP Pools details: GET /monitoring/v1/gateways/{serial}/dhcp_pools.
     *
     * @return ListResource<DHCPPoolInfo>
     */
    public function getGatewayDhcpPools(string $serial): ListResource
    {
        return new ListResource($this->connector, DHCPPoolInfo::class, fn (Query $query) => new GetGatewayDhcpPoolsRequest($serial, $query));
    }

    /**
     * Gateway Port Errors: GET /monitoring/v1/gateways/{serial}/ports/errors.
     *
     * @return ListResource<GatewayPortErrors>
     */
    public function getGatewayPortErrors(string $serial): ListResource
    {
        return new ListResource($this->connector, GatewayPortErrors::class, fn (Query $query) => new GetGatewayPortErrorsRequest($serial, $query));
    }

    /**
     * Gateway Ports Details: GET /monitoring/v1/gateways/{serial}/ports.
     *
     * @return ListResource<PortDetail>
     */
    public function getGatewayPorts(string $serial): ListResource
    {
        return new ListResource($this->connector, PortDetail::class, fn (Query $query) => new GetGatewayPortsRequest($serial, $query));
    }

    /**
     * Gateway Ports Bandwidth Usage: GET /monitoring/v1/gateways/{serial}/ports/bandwidth_usage.
     *
     * @return ListResource<Bandwidth>
     */
    public function getGatewayPortsBandwidthUsage(string $serial): ListResource
    {
        return new ListResource($this->connector, Bandwidth::class, fn (Query $query) => new GetGatewayPortsBandwidthUsageRequest($serial, $query));
    }

    /**
     * Gateway Tunnels Details: GET /monitoring/v1/gateways/{serial}/tunnels.
     *
     * @return ListResource<TunnelDetail>
     */
    public function getGatewayTunnels(string $serial): ListResource
    {
        return new ListResource($this->connector, TunnelDetail::class, fn (Query $query) => new GetGatewayTunnelsRequest($serial, $query));
    }

    /**
     * Gateway Uplink Bandwidth Usage: GET /monitoring/v1/gateways/{serial}/uplinks/bandwidth_usage.
     *
     * @return ListResource<Bandwidth>
     */
    public function getGatewayUplinksBandwidthUsage(string $serial): ListResource
    {
        return new ListResource($this->connector, Bandwidth::class, fn (Query $query) => new GetGatewayUplinksBandwidthUsageRequest($serial, $query));
    }

    /**
     * Gateway Uplink Details: GET /monitoring/v1/gateways/{serial}/uplinks.
     *
     * @return ListResource<Uplink>
     */
    public function getGatewayUplinksDetail(string $serial): ListResource
    {
        return new ListResource($this->connector, Uplink::class, fn (Query $query) => new GetGatewayUplinksDetailRequest($serial, $query));
    }

    /**
     * Gateway Uplink distribution: GET /monitoring/v1/gateways/{serial}/uplinks/distribution.
     *
     * @return ListResource<UplinksDistribution>
     */
    public function getGatewayUplinksDistribution(string $serial): ListResource
    {
        return new ListResource($this->connector, UplinksDistribution::class, fn (Query $query) => new GetGatewayUplinksDistributionRequest($serial, $query));
    }

    /**
     * Gateway Uplink tunnel stats: GET /monitoring/v1/gateways/{serial}/tunnels/stats.
     *
     * @return ListResource<Bandwidth>
     */
    public function getGatewayUplinksTunnelStats(string $serial): ListResource
    {
        return new ListResource($this->connector, Bandwidth::class, fn (Query $query) => new GetGatewayUplinksTunnelStatsRequest($serial, $query));
    }

    /**
     * Gateway Uplink WAN compression stats: GET /monitoring/v1/gateways/{serial}/uplinks/wan_compression_stats.
     *
     * @return ListResource<WANCompressionStats>
     */
    public function getGatewayUplinksWanCompressionUsage(string $serial): ListResource
    {
        return new ListResource($this->connector, WANCompressionStats::class, fn (Query $query) => new GetGatewayUplinksWanCompressionUsageRequest($serial, $query));
    }

    /**
     * Gateway VLAN details: GET /monitoring/v1/gateways/{serial}/vlan.
     *
     * @return ListResource<GatewayVLANInfoItem>
     */
    public function getGatewayVlanInfo(string $serial): ListResource
    {
        return new ListResource($this->connector, GatewayVLANInfoItem::class, fn (Query $query) => new GetGatewayVlanInfoRequest($serial, $query));
    }
}
