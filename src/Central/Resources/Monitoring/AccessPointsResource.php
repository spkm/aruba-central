<?php

namespace spkm\ArubaCentral\Central\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointCPUUtilization;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointDHCPPoolItem;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointItem;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointMemoryUtilization;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointPowerConsumption;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointRadioItem;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointTunnelDetail;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointTunnelItem;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointWlanInfoWithClientCount;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointWLANThroughputTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\APProbeTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\APThroughputTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\BssidItem;
use spkm\ArubaCentral\Central\Data\Monitoring\PortCollisionsTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\PortCrcTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\PortFramesTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\PortItem;
use spkm\ArubaCentral\Central\Data\Monitoring\PortThroughputTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\RadioItem;
use spkm\ArubaCentral\Central\Data\Monitoring\RadioThroughputTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\RFChannelQualityTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\RFChannelUtilizationTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\RFFramesTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\RFNoiseFloorTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\SwarmInfo;
use spkm\ArubaCentral\Central\Data\Monitoring\SwarmListInfo;
use spkm\ArubaCentral\Central\Data\Monitoring\TopAccessPoint;
use spkm\ArubaCentral\Central\Data\Monitoring\TunnelThroughputTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\WlanInfoWithClientCount;
use spkm\ArubaCentral\Central\Data\Monitoring\WLANThroughputTrend;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointCPUUtilizationRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointDetailsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointDHCPPoolListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointMemoryUtilizationRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointPortCollisionsPerformanceRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointPortCrcPerformanceRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointPortFramesPerformanceRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointPortListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointPortThroughputRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointPowerConsumptionRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointProbeJitterTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointProbeLatencyTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointProbeLossTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointProbeMosTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointRadioListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointRadioThroughputRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointThroughputRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointTunnelDetailRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointTunnelListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointTunnelThroughputRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointWlanListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointWlanThroughputRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAPRFChannelQualityPerformanceRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAPRFChannelUtilizationPerformanceRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAPRFFramesPerformanceRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAPRFNoiseFloorPerformanceRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetBssidsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetRadioListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetSwarmRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetSwarmsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetTopAccessPointsByUsageRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetTopAccessPointsByWiredUsageRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetTopAccessPointsByWirelessUsageRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetWlanListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetWlanRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetWlanThroughputTrendRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Access Points API, from Aruba::accessPoints().
 *
 * @extends Builder<AccessPointItem>
 */
class AccessPointsResource extends Builder
{
    protected string $idField = 'serialNumber';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, AccessPointItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAccessPointsRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetAccessPointDetailsRequest((string) $id);
    }

    /**
     * Get CPU utilization information for an Access Point: GET /network-monitoring/v1/aps/{serial-number}/cpu-utilization-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAccessPointCPUUtilization(string $serialNumber, array $options = []): ?AccessPointCPUUtilization
    {
        return $this->fetch(new GetAccessPointCPUUtilizationRequest($serialNumber, $options));
    }

    /**
     * Get a list of AP DHCP Pools: GET /network-monitoring/v1/aps/{serial-number}/dhcp-pools.
     *
     * @return ListResource<AccessPointDHCPPoolItem>
     */
    public function dhcpPoolsOf(string $serialNumber): ListResource
    {
        return new ListResource($this->connector, AccessPointDHCPPoolItem::class, fn (Query $query) => new GetAccessPointDHCPPoolListRequest($serialNumber, $query));
    }

    /**
     * Get memory utilization information for an Access Point: GET /network-monitoring/v1/aps/{serial-number}/memory-utilization-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAccessPointMemoryUtilization(string $serialNumber, array $options = []): ?AccessPointMemoryUtilization
    {
        return $this->fetch(new GetAccessPointMemoryUtilizationRequest($serialNumber, $options));
    }

    /**
     * Get Access Point Port Collision Errors: GET /network-monitoring/v1/aps/{serial-number}/ports/{port-index}/collisions-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAccessPointPortCollisionsPerformance(string $serialNumber, string $portIndex, array $options = []): ?PortCollisionsTrend
    {
        return $this->fetch(new GetAccessPointPortCollisionsPerformanceRequest($serialNumber, $portIndex, $options));
    }

    /**
     * Get Access Point Port CRC Errors: GET /network-monitoring/v1/aps/{serial-number}/ports/{port-index}/crc-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAccessPointPortCrcPerformance(string $serialNumber, string $portIndex, array $options = []): ?PortCrcTrend
    {
        return $this->fetch(new GetAccessPointPortCrcPerformanceRequest($serialNumber, $portIndex, $options));
    }

    /**
     * Get Access Point Port Frame Trends: GET /network-monitoring/v1/aps/{serial-number}/ports/{port-index}/frames-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAccessPointPortFramesPerformance(string $serialNumber, string $portIndex, array $options = []): ?PortFramesTrend
    {
        return $this->fetch(new GetAccessPointPortFramesPerformanceRequest($serialNumber, $portIndex, $options));
    }

    /**
     * Get a list of Access Point ports: GET /network-monitoring/v1/aps/{serial-number}/ports.
     *
     * @return ListResource<PortItem>
     */
    public function portsOf(string $serialNumber): ListResource
    {
        return new ListResource($this->connector, PortItem::class, fn (Query $query) => new GetAccessPointPortListRequest($serialNumber, $query));
    }

    /**
     * Get Access Point Port throughput trend.: GET /network-monitoring/v1/aps/{serial-number}/ports/{port-index}/throughput-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAccessPointPortThroughput(string $serialNumber, string $portIndex, array $options = []): ?PortThroughputTrend
    {
        return $this->fetch(new GetAccessPointPortThroughputRequest($serialNumber, $portIndex, $options));
    }

    /**
     * Get power consumption information for an Access Point: GET /network-monitoring/v1/aps/{serial-number}/power-consumption-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAccessPointPowerConsumption(string $serialNumber, array $options = []): ?AccessPointPowerConsumption
    {
        return $this->fetch(new GetAccessPointPowerConsumptionRequest($serialNumber, $options));
    }

    /**
     * Get jitter trend of an Access Point Tunnel.: GET /network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}/jitter-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAccessPointProbeJitterTrend(string $serialNumber, string $tunnelId, array $options = []): ?APProbeTrend
    {
        return $this->fetch(new GetAccessPointProbeJitterTrendRequest($serialNumber, $tunnelId, $options));
    }

    /**
     * Get latency trend of an Access Point Tunnel.: GET /network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}/latency-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAccessPointProbeLatencyTrend(string $serialNumber, string $tunnelId, array $options = []): ?APProbeTrend
    {
        return $this->fetch(new GetAccessPointProbeLatencyTrendRequest($serialNumber, $tunnelId, $options));
    }

    /**
     * Get packet loss trend of an Access Point Tunnel.: GET /network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}/packet-loss-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAccessPointProbeLossTrend(string $serialNumber, string $tunnelId, array $options = []): ?APProbeTrend
    {
        return $this->fetch(new GetAccessPointProbeLossTrendRequest($serialNumber, $tunnelId, $options));
    }

    /**
     * Get MOS score trend of an Access Point Tunnel.: GET /network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}/mos-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAccessPointProbeMosTrend(string $serialNumber, string $tunnelId, array $options = []): ?APProbeTrend
    {
        return $this->fetch(new GetAccessPointProbeMosTrendRequest($serialNumber, $tunnelId, $options));
    }

    /**
     * Get a list of Access Point radios: GET /network-monitoring/v1/aps/{serial-number}/radios.
     *
     * @return ListResource<AccessPointRadioItem>
     */
    public function radiosOf(string $serialNumber): ListResource
    {
        return new ListResource($this->connector, AccessPointRadioItem::class, fn (Query $query) => new GetAccessPointRadioListRequest($serialNumber, $query));
    }

    /**
     * Get Access Point Radio throughput trend.: GET /network-monitoring/v1/aps/{serial-number}/radios/{radio-number}/throughput-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAccessPointRadioThroughput(string $serialNumber, string $radioNumber, array $options = []): ?RadioThroughputTrend
    {
        return $this->fetch(new GetAccessPointRadioThroughputRequest($serialNumber, $radioNumber, $options));
    }

    /**
     * Get throughput trend of an Access Point.: GET /network-monitoring/v1/aps/{serial-number}/throughput-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAccessPointThroughput(string $serialNumber, string $interfaceType, array $options = []): ?APThroughputTrend
    {
        return $this->fetch(new GetAccessPointThroughputRequest($serialNumber, $interfaceType, $options));
    }

    /**
     * Get an Access Point Tunnel details: GET /network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAccessPointTunnelDetail(string $serialNumber, string $tunnelId, array $options = []): ?AccessPointTunnelDetail
    {
        return $this->fetch(new GetAccessPointTunnelDetailRequest($serialNumber, $tunnelId, $options));
    }

    /**
     * Get a list of Access Point Tunnels: GET /network-monitoring/v1/aps/{serial-number}/tunnels.
     *
     * @return ListResource<AccessPointTunnelItem>
     */
    public function tunnelsOf(string $serialNumber): ListResource
    {
        return new ListResource($this->connector, AccessPointTunnelItem::class, fn (Query $query) => new GetAccessPointTunnelListRequest($serialNumber, $query));
    }

    /**
     * Get throughput trend of an Access Point Tunnel.: GET /network-monitoring/v1/aps/{serial-number}/tunnels/{tunnel-id}/throughput-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAccessPointTunnelThroughput(string $serialNumber, string $tunnelId, array $options = []): ?TunnelThroughputTrend
    {
        return $this->fetch(new GetAccessPointTunnelThroughputRequest($serialNumber, $tunnelId, $options));
    }

    /**
     * Get a list of Access Point WLANs: GET /network-monitoring/v1/aps/{serial-number}/wlans.
     *
     * @return ListResource<AccessPointWlanInfoWithClientCount>
     */
    public function wlansOf(string $serialNumber): ListResource
    {
        return new ListResource($this->connector, AccessPointWlanInfoWithClientCount::class, fn (Query $query) => new GetAccessPointWlanListRequest($serialNumber, $query));
    }

    /**
     * Get the throughput trend for a WLAN of an Access Point.: GET /network-monitoring/v1/aps/{serial-number}/wlans/{wlan-name}/throughput-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAccessPointWlanThroughput(string $serialNumber, string $wlanName, array $options = []): ?AccessPointWLANThroughputTrend
    {
        return $this->fetch(new GetAccessPointWlanThroughputRequest($serialNumber, $wlanName, $options));
    }

    /**
     * Get channel quality information for a radio: GET /network-monitoring/v1/aps/{serial-number}/radios/{radio-number}/channel-quality-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAPRFChannelQualityPerformance(string $serialNumber, string $radioNumber, array $options = []): ?RFChannelQualityTrend
    {
        return $this->fetch(new GetAPRFChannelQualityPerformanceRequest($serialNumber, $radioNumber, $options));
    }

    /**
     * Get channel utilization information for a radio: GET /network-monitoring/v1/aps/{serial-number}/radios/{radio-number}/channel-utilization-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAPRFChannelUtilizationPerformance(string $serialNumber, string $radioNumber, array $options = []): ?RFChannelUtilizationTrend
    {
        return $this->fetch(new GetAPRFChannelUtilizationPerformanceRequest($serialNumber, $radioNumber, $options));
    }

    /**
     * Get transmission information for a radio: GET /network-monitoring/v1/aps/{serial-number}/radios/{radio-number}/frames-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAPRFFramesPerformance(string $serialNumber, string $radioNumber, array $options = []): ?RFFramesTrend
    {
        return $this->fetch(new GetAPRFFramesPerformanceRequest($serialNumber, $radioNumber, $options));
    }

    /**
     * Get noise floor information for a radio: GET /network-monitoring/v1/aps/{serial-number}/radios/{radio-number}/noise-floor-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAPRFNoiseFloorPerformance(string $serialNumber, string $radioNumber, array $options = []): ?RFNoiseFloorTrend
    {
        return $this->fetch(new GetAPRFNoiseFloorPerformanceRequest($serialNumber, $radioNumber, $options));
    }

    /**
     * Get a list of BSSIDs: GET /network-monitoring/v1/bssids.
     *
     * @return ListResource<BssidItem>
     */
    public function bssids(): ListResource
    {
        return new ListResource($this->connector, BssidItem::class, fn (Query $query) => new GetBssidsRequest($query));
    }

    /**
     * Get a list of Radios: GET /network-monitoring/v1/radios.
     *
     * @return ListResource<RadioItem>
     */
    public function radios(): ListResource
    {
        return new ListResource($this->connector, RadioItem::class, fn (Query $query) => new GetRadioListRequest($query));
    }

    /**
     * Get a list of Swarms: GET /network-monitoring/v1/swarms.
     *
     * @return ListResource<SwarmListInfo>
     */
    public function swarms(): ListResource
    {
        return new ListResource($this->connector, SwarmListInfo::class, fn (Query $query) => new GetSwarmsRequest($query));
    }

    /**
     * Get a Swarm details: GET /network-monitoring/v1/swarms/{cluster-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function swarm(string $clusterId, array $options = []): ?SwarmInfo
    {
        return $this->fetch(new GetSwarmRequest($clusterId, $options));
    }

    /**
     * Get high total bandwidth usage Access Points: GET /network-monitoring/v1/top-aps-by-usage.
     *
     * @return ListResource<TopAccessPoint>
     */
    public function topByUsage(): ListResource
    {
        return new ListResource($this->connector, TopAccessPoint::class, fn (Query $query) => new GetTopAccessPointsByUsageRequest($query));
    }

    /**
     * Get high wired bandwidth usage Access Points: GET /network-monitoring/v1/top-aps-by-wired-usage.
     *
     * @return ListResource<TopAccessPoint>
     */
    public function topByWiredUsage(): ListResource
    {
        return new ListResource($this->connector, TopAccessPoint::class, fn (Query $query) => new GetTopAccessPointsByWiredUsageRequest($query));
    }

    /**
     * Get high wireless bandwidth usage Access Points: GET /network-monitoring/v1/top-aps-by-wireless-usage.
     *
     * @return ListResource<TopAccessPoint>
     */
    public function topByWirelessUsage(): ListResource
    {
        return new ListResource($this->connector, TopAccessPoint::class, fn (Query $query) => new GetTopAccessPointsByWirelessUsageRequest($query));
    }

    /**
     * Get a list of WLANs: GET /network-monitoring/v1/wlans.
     *
     * @return ListResource<WlanInfoWithClientCount>
     */
    public function wlans(): ListResource
    {
        return new ListResource($this->connector, WlanInfoWithClientCount::class, fn (Query $query) => new GetWlanListRequest($query));
    }

    /**
     * Get the throughput trend for a WLAN.: GET /network-monitoring/v1/wlans/{wlan-name}/throughput-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function getWlanThroughputTrend(string $wlanName, array $options = []): ?WLANThroughputTrend
    {
        return $this->fetch(new GetWlanThroughputTrendRequest($wlanName, $options));
    }

    /**
     * Get a specific WLAN by name: GET /network-monitoring/v1/wlans/{wlan-name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function wlan(string $wlanName, array $options = []): ?WlanInfoWithClientCount
    {
        return $this->fetch(new GetWlanRequest($wlanName, $options));
    }
}
