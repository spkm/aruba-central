<?php

namespace spkm\ArubaCentral\Central\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Monitoring\ClusterCapacityTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\ClusterConnectivityGraph;
use spkm\ArubaCentral\Central\Data\Monitoring\ClusterMemberCapacityTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\ClusterMemberItem;
use spkm\ArubaCentral\Central\Data\Monitoring\ClusterTunnelHealthSummary;
use spkm\ArubaCentral\Central\Data\Monitoring\ClusterTunnelStatusSummary;
use spkm\ArubaCentral\Central\Data\Monitoring\ClusterVlanMismatch;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayClusterTunnelItem;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayDhcpLeaseItem;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayDhcpPoolItem;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayItem;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayPort;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayPortItem;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayTunnelDetail;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayTunnelHealthSummary;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayTunnelItem;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayUplinkDetail;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayUplinkItem;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayVlanDetail;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayVlanItem;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayWanTunnelHealthSummary;
use spkm\ArubaCentral\Central\Data\Monitoring\GwCPUTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwFramesErrorsTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwFramesPacketsTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwFramesTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwInterfaceThroughputTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwLanTunnelStatusTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwLanTunnelThroughputTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwMemTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwModemStats;
use spkm\ArubaCentral\Central\Data\Monitoring\GwProbePerformanceTrends;
use spkm\ArubaCentral\Central\Data\Monitoring\GwTempTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwTunnelPacketsTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwUplinkThroughputTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwUplVpnAvailTrends;
use spkm\ArubaCentral\Central\Data\Monitoring\GwUplWanAvailTrends;
use spkm\ArubaCentral\Central\Data\Monitoring\GwVpnAvailTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwWanAvailTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwWanCompressionTrend;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetClusterCapacityTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetClusterMemberCapacityTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayClusterConnectivityGraphRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayClusterMemberListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayClusterTunnelHealthRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayClusterTunnelListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayClusterTunnelsStatusSummaryRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayClusterVlanMismatchSummaryRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayDetailRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayDhcpLeaseListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayDhcpPoolListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayFramesErrorsTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayFramesPacketsTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayFramesTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayHardwareCPUUtilizationRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayHardwareMemoryUtilizationRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayHardwareTemperatureRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayLanTunnelHealthRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayModemStatsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayPortDetailRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayPortsListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayPortThroughputTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewaysRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayTunnelDetailRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayTunnelDroppedPacketsTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayTunnelListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayTunnelStatusTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayTunnelThroughputTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayUplinkListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayUplinkPerformanceTrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayUplinkProbeListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayUplinkThroughputTrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayUplinkVpnAvailabilityTrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayUplinkWanAvailabilityTrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayVlanDetailRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayVlanListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayVpnAvailabilityTrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayWanAvailabilityTrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayWanCompressionTrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayWanInterfaceDetailRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayWanTunnelHealthRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Gateways API, from Aruba::gateways().
 *
 * @extends Builder<GatewayItem>
 */
class GatewaysResource extends Builder
{
    protected string $idField = 'serialNumber';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, GatewayItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetGatewaysRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetGatewayDetailRequest((string) $id);
    }

    /**
     * Get cluster capacity trend: GET /network-monitoring/v1/clusters/{cluster-name}/capacity-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getClusterCapacityTrend(string $clusterName, array $options = []): ?ClusterCapacityTrend
    {
        return $this->fetch(new GetClusterCapacityTrendRequest($clusterName, $options));
    }

    /**
     * Get cluster member capacity trend: GET /network-monitoring/v1/clusters/{cluster-name}/capacity-trends/{serial-number}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getClusterMemberCapacityTrend(string $clusterName, string $serialNumber, array $options = []): ?ClusterMemberCapacityTrend
    {
        return $this->fetch(new GetClusterMemberCapacityTrendRequest($clusterName, $serialNumber, $options));
    }

    /**
     * Gateway cluster connectivity graph information: GET /network-monitoring/v1/clusters/{cluster-name}/connectivity-graph.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayClusterConnectivityGraph(string $clusterName, array $options = []): ?ClusterConnectivityGraph
    {
        return $this->fetch(new GetGatewayClusterConnectivityGraphRequest($clusterName, $options));
    }

    /**
     * List Gateway Cluster members: GET /network-monitoring/v1/clusters/{cluster-name}/members.
     *
     * @return ListResource<ClusterMemberItem>
     */
    public function clusterMembers(string $clusterName): ListResource
    {
        return new ListResource($this->connector, ClusterMemberItem::class, fn (Query $query) => new GetGatewayClusterMemberListRequest($clusterName, $query));
    }

    /**
     * Get summary of cluster tunnel health: GET /network-monitoring/v1/clusters/{cluster-name}/tunnels-health-summary.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayClusterTunnelHealth(string $clusterName, array $options = []): ?ClusterTunnelHealthSummary
    {
        return $this->fetch(new GetGatewayClusterTunnelHealthRequest($clusterName, $options));
    }

    /**
     * List Gateway Cluster tunnels: GET /network-monitoring/v1/clusters/{cluster-name}/tunnels.
     *
     * @return ListResource<GatewayClusterTunnelItem>
     */
    public function clusterTunnels(string $clusterName): ListResource
    {
        return new ListResource($this->connector, GatewayClusterTunnelItem::class, fn (Query $query) => new GetGatewayClusterTunnelListRequest($clusterName, $query));
    }

    /**
     * Get summary of cluster tunnel status: GET /network-monitoring/v1/clusters/{cluster-name}/tunnels-status-summary.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayClusterTunnelsStatusSummary(string $clusterName, array $options = []): ?ClusterTunnelStatusSummary
    {
        return $this->fetch(new GetGatewayClusterTunnelsStatusSummaryRequest($clusterName, $options));
    }

    /**
     * Gateway cluster VLAN mismatch summary: GET /network-monitoring/v1/clusters/{cluster-name}/vlan-mismatch.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayClusterVlanMismatchSummary(string $clusterName, array $options = []): ?ClusterVlanMismatch
    {
        return $this->fetch(new GetGatewayClusterVlanMismatchSummaryRequest($clusterName, $options));
    }

    /**
     * Get DHCP leases present in the DHCP pool: GET /network-monitoring/v1/gateways/{serial-number}/dhcp-clients.
     *
     * @return ListResource<GatewayDhcpLeaseItem>
     */
    public function dhcpClientsOf(string $serialNumber): ListResource
    {
        return new ListResource($this->connector, GatewayDhcpLeaseItem::class, fn (Query $query) => new GetGatewayDhcpLeaseListRequest($serialNumber, $query));
    }

    /**
     * Get DHCP pools configured on the gateway: GET /network-monitoring/v1/gateways/{serial-number}/dhcp-pools.
     *
     * @return ListResource<GatewayDhcpPoolItem>
     */
    public function dhcpPoolsOf(string $serialNumber): ListResource
    {
        return new ListResource($this->connector, GatewayDhcpPoolItem::class, fn (Query $query) => new GetGatewayDhcpPoolListRequest($serialNumber, $query));
    }

    /**
     * Get gateway port frames errors trend: GET /network-monitoring/v1/gateways/{serial-number}/ports/{port-number}/frames-errors-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayFramesErrorsTrend(string $serialNumber, string $portNumber, array $options = []): ?GwFramesErrorsTrend
    {
        return $this->fetch(new GetGatewayFramesErrorsTrendRequest($serialNumber, $portNumber, $options));
    }

    /**
     * Get gateway port frames packets trend: GET /network-monitoring/v1/gateways/{serial-number}/ports/{port-number}/frames-packets-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayFramesPacketsTrend(string $serialNumber, string $portNumber, array $options = []): ?GwFramesPacketsTrend
    {
        return $this->fetch(new GetGatewayFramesPacketsTrendRequest($serialNumber, $portNumber, $options));
    }

    /**
     * Get gateway port frames trend: GET /network-monitoring/v1/gateways/{serial-number}/ports/{port-number}/frames-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayFramesTrend(string $serialNumber, string $portNumber, array $options = []): ?GwFramesTrend
    {
        return $this->fetch(new GetGatewayFramesTrendRequest($serialNumber, $portNumber, $options));
    }

    /**
     * Get gateway CPU utilization trend: GET /network-monitoring/v1/gateways/{serial-number}/cpu-utilization-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayHardwareCPUUtilization(string $serialNumber, array $options = []): ?GwCPUTrend
    {
        return $this->fetch(new GetGatewayHardwareCPUUtilizationRequest($serialNumber, $options));
    }

    /**
     * Get gateway memory utilization trend: GET /network-monitoring/v1/gateways/{serial-number}/memory-utilization-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayHardwareMemoryUtilization(string $serialNumber, array $options = []): ?GwMemTrend
    {
        return $this->fetch(new GetGatewayHardwareMemoryUtilizationRequest($serialNumber, $options));
    }

    /**
     * Get gateway hardware temperature trends: GET /network-monitoring/v1/gateways/{serial-number}/hardware-temperature-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayHardwareTemperature(string $serialNumber, array $options = []): ?GwTempTrend
    {
        return $this->fetch(new GetGatewayHardwareTemperatureRequest($serialNumber, $options));
    }

    /**
     * Get summary of gateway LAN tunnels health: GET /network-monitoring/v1/gateways/{serial-number}/lan-tunnels-health-summary.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayLanTunnelHealth(string $serialNumber, array $options = []): ?GatewayTunnelHealthSummary
    {
        return $this->fetch(new GetGatewayLanTunnelHealthRequest($serialNumber, $options));
    }

    /**
     * Get gateway uplink modem stats: GET /network-monitoring/v1/gateways/{serial-number}/modem-stat.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayModemStats(string $serialNumber, array $options = []): ?GwModemStats
    {
        return $this->fetch(new GetGatewayModemStatsRequest($serialNumber, $options));
    }

    /**
     * Gateway port detail: GET /network-monitoring/v1/gateways/{serial-number}/ports/{port-number}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayPortDetail(string $serialNumber, string $portNumber, array $options = []): ?GatewayPort
    {
        return $this->fetch(new GetGatewayPortDetailRequest($serialNumber, $portNumber, $options));
    }

    /**
     * List Gateway ports: GET /network-monitoring/v1/gateways/{serial-number}/ports.
     *
     * @return ListResource<GatewayPortItem>
     */
    public function portsOf(string $serialNumber): ListResource
    {
        return new ListResource($this->connector, GatewayPortItem::class, fn (Query $query) => new GetGatewayPortsListRequest($serialNumber, $query));
    }

    /**
     * Get gateway port throughput trend: GET /network-monitoring/v1/gateways/{serial-number}/ports/{port-number}/throughput-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayPortThroughputTrend(string $serialNumber, string $portNumber, array $options = []): ?GwInterfaceThroughputTrend
    {
        return $this->fetch(new GetGatewayPortThroughputTrendRequest($serialNumber, $portNumber, $options));
    }

    /**
     * Gateway tunnel detail: GET /network-monitoring/v1/gateways/{serial-number}/tunnels/{tunnel-name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayTunnelDetail(string $serialNumber, string $tunnelName, array $options = []): ?GatewayTunnelDetail
    {
        return $this->fetch(new GetGatewayTunnelDetailRequest($serialNumber, $tunnelName, $options));
    }

    /**
     * Get gateway tunnel dropped packets trend: GET /network-monitoring/v1/gateways/{serial-number}/tunnels/{tunnel-name}/dropped-packet-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayTunnelDroppedPacketsTrend(string $serialNumber, string $tunnelName, array $options = []): ?GwTunnelPacketsTrend
    {
        return $this->fetch(new GetGatewayTunnelDroppedPacketsTrendRequest($serialNumber, $tunnelName, $options));
    }

    /**
     * List Gateway tunnels: GET /network-monitoring/v1/gateways/{serial-number}/tunnels.
     *
     * @return ListResource<GatewayTunnelItem>
     */
    public function tunnelsOf(string $serialNumber): ListResource
    {
        return new ListResource($this->connector, GatewayTunnelItem::class, fn (Query $query) => new GetGatewayTunnelListRequest($serialNumber, $query));
    }

    /**
     * Get gateway tunnel status trend: GET /network-monitoring/v1/gateways/{serial-number}/tunnels/{tunnel-name}/status-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayTunnelStatusTrend(string $serialNumber, string $tunnelName, array $options = []): ?GwLanTunnelStatusTrend
    {
        return $this->fetch(new GetGatewayTunnelStatusTrendRequest($serialNumber, $tunnelName, $options));
    }

    /**
     * Get gateway tunnel throughput trend: GET /network-monitoring/v1/gateways/{serial-number}/tunnels/{tunnel-name}/throughput-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayTunnelThroughputTrend(string $serialNumber, string $tunnelName, array $options = []): ?GwLanTunnelThroughputTrend
    {
        return $this->fetch(new GetGatewayTunnelThroughputTrendRequest($serialNumber, $tunnelName, $options));
    }

    /**
     * List Gateway uplinks: GET /network-monitoring/v1/gateways/{serial-number}/uplinks.
     *
     * @return ListResource<GatewayUplinkItem>
     */
    public function uplinksOf(string $serialNumber): ListResource
    {
        return new ListResource($this->connector, GatewayUplinkItem::class, fn (Query $query) => new GetGatewayUplinkListRequest($serialNumber, $query));
    }

    /**
     * Get uplink probe performance trends: GET /network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}/probes/{probe}/performance-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayUplinkPerformanceTrends(string $serialNumber, string $linkTag, string $probe, array $options = []): ?GwProbePerformanceTrends
    {
        return $this->fetch(new GetGatewayUplinkPerformanceTrendsRequest($serialNumber, $linkTag, $probe, $options));
    }

    /**
     * List gateway uplink probes: GET /network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}/probes.
     *
     * @return ListResource<Data>
     */
    public function getGatewayUplinkProbeList(string $serialNumber, string $linkTag): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new GetGatewayUplinkProbeListRequest($serialNumber, $linkTag, $query));
    }

    /**
     * Get gateway uplink throughput trend: GET /network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}/throughput-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayUplinkThroughputTrends(string $serialNumber, string $linkTag, array $options = []): ?GwUplinkThroughputTrend
    {
        return $this->fetch(new GetGatewayUplinkThroughputTrendsRequest($serialNumber, $linkTag, $options));
    }

    /**
     * Get VPN availability trends of gateway uplink: GET /network-monitoring/v1/gateways/{serial-number}/uplinks/{vlan-id}/vpn-availability-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayUplinkVpnAvailabilityTrends(string $serialNumber, string $vlanId, array $options = []): ?GwUplVpnAvailTrends
    {
        return $this->fetch(new GetGatewayUplinkVpnAvailabilityTrendsRequest($serialNumber, $vlanId, $options));
    }

    /**
     * Get WAN availability trends of gateway uplink: GET /network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}/wan-availability-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayUplinkWanAvailabilityTrends(string $serialNumber, string $linkTag, array $options = []): ?GwUplWanAvailTrends
    {
        return $this->fetch(new GetGatewayUplinkWanAvailabilityTrendsRequest($serialNumber, $linkTag, $options));
    }

    /**
     * Gateway VLAN detail: GET /network-monitoring/v1/gateways/{serial-number}/vlans/{vlan-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayVlanDetail(string $serialNumber, string $vlanId, array $options = []): ?GatewayVlanDetail
    {
        return $this->fetch(new GetGatewayVlanDetailRequest($serialNumber, $vlanId, $options));
    }

    /**
     * List Gateway VLANs: GET /network-monitoring/v1/gateways/{serial-number}/vlans.
     *
     * @return ListResource<GatewayVlanItem>
     */
    public function vlansOf(string $serialNumber): ListResource
    {
        return new ListResource($this->connector, GatewayVlanItem::class, fn (Query $query) => new GetGatewayVlanListRequest($serialNumber, $query));
    }

    /**
     * Get gateway VPN availability trend: GET /network-monitoring/v1/gateways/{serial-number}/vpn-availability-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayVpnAvailabilityTrends(string $serialNumber, array $options = []): ?GwVpnAvailTrend
    {
        return $this->fetch(new GetGatewayVpnAvailabilityTrendsRequest($serialNumber, $options));
    }

    /**
     * Get gateway WAN availability trend: GET /network-monitoring/v1/gateways/{serial-number}/wan-availability-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayWanAvailabilityTrends(string $serialNumber, array $options = []): ?GwWanAvailTrend
    {
        return $this->fetch(new GetGatewayWanAvailabilityTrendsRequest($serialNumber, $options));
    }

    /**
     * Get gateway WAN compression trends for an uplink: GET /network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}/wan-compression-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayWanCompressionTrends(string $serialNumber, string $linkTag, array $options = []): ?GwWanCompressionTrend
    {
        return $this->fetch(new GetGatewayWanCompressionTrendsRequest($serialNumber, $linkTag, $options));
    }

    /**
     * Get details of gateway uplink: GET /network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayWanInterfaceDetail(string $serialNumber, string $linkTag, array $options = []): ?GatewayUplinkDetail
    {
        return $this->fetch(new GetGatewayWanInterfaceDetailRequest($serialNumber, $linkTag, $options));
    }

    /**
     * Get summary of gateway WAN tunnel health: GET /network-monitoring/v1/gateways/{serial-number}/wan-tunnels-health-summary.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayWanTunnelHealth(string $serialNumber, array $options = []): ?GatewayWanTunnelHealthSummary
    {
        return $this->fetch(new GetGatewayWanTunnelHealthRequest($serialNumber, $options));
    }
}
