<?php

namespace spkm\ArubaCentral\Classic\Resources\Topology;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Topology\DeviceDetails;
use spkm\ArubaCentral\Classic\Data\Topology\EdgeResponseDetails;
use spkm\ArubaCentral\Classic\Data\Topology\NeighborDetails;
use spkm\ArubaCentral\Classic\Data\Topology\TopologyDetails;
use spkm\ArubaCentral\Classic\Data\Topology\TunnelResponseDetails;
use spkm\ArubaCentral\Classic\Data\Topology\UnreachableDeviceList;
use spkm\ArubaCentral\Classic\Data\Topology\UplinkResponseDetails;
use spkm\ArubaCentral\Classic\Data\Topology\VlanObjectSchema;
use spkm\ArubaCentral\Classic\Requests\Topology\Topology\DisplayGetTunnelRequest;
use spkm\ArubaCentral\Classic\Requests\Topology\Topology\DisplayTopologyApNeighborsRequest;
use spkm\ArubaCentral\Classic\Requests\Topology\Topology\DisplayTopologyDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Topology\Topology\DisplayTopologyEdgesRequest;
use spkm\ArubaCentral\Classic\Requests\Topology\Topology\DisplayTopologyEdgesV2Request;
use spkm\ArubaCentral\Classic\Requests\Topology\Topology\DisplayTopologyExpiringDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Topology\Topology\DisplayTopologyRequest;
use spkm\ArubaCentral\Classic\Requests\Topology\Topology\DisplayTopologyUplinksRequest;
use spkm\ArubaCentral\Classic\Requests\Topology\Topology\DisplayTopologyVlansRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Topology API, from Aruba::topology().
 *
 * @extends BaseResource<Data>
 */
class TopologyResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get tunnel details.: GET /topology_external_api/tunnels/{site_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function displayGetTunnel(int $siteId, string $tunnelMapNames, array $options = []): ?TunnelResponseDetails
    {
        return $this->fetch(new DisplayGetTunnelRequest($siteId, $tunnelMapNames, $options));
    }

    /**
     * Get topology details of a site.: GET /topology_external_api/{site_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function displayTopology(int $siteId, array $options = []): ?TopologyDetails
    {
        return $this->fetch(new DisplayTopologyRequest($siteId, $options));
    }

    /**
     * Get neighbor details reported by AP via LLDP.: GET /topology_external_api/apNeighbors/{device_serial}.
     *
     * @param  array<string, mixed>  $options
     */
    public function displayTopologyApNeighbors(string $deviceSerial, array $options = []): ?NeighborDetails
    {
        return $this->fetch(new DisplayTopologyApNeighborsRequest($deviceSerial, $options));
    }

    /**
     * Get details of a device.: GET /topology_external_api/devices/{device_serial}.
     *
     * @param  array<string, mixed>  $options
     */
    public function displayTopologyDevices(string $deviceSerial, array $options = []): ?DeviceDetails
    {
        return $this->fetch(new DisplayTopologyDevicesRequest($deviceSerial, $options));
    }

    /**
     * Get details of an edge.: GET /topology_external_api/edges/{source_serial}/{dest_serial}.
     *
     * @param  array<string, mixed>  $options
     */
    public function displayTopologyEdges(string $sourceSerial, string $destSerial, array $options = []): ?EdgeResponseDetails
    {
        return $this->fetch(new DisplayTopologyEdgesRequest($sourceSerial, $destSerial, $options));
    }

    /**
     * Get details of an edge for the selected source and destination.: GET /topology_external_api/v2/edges/{source_serial}/{dest_serial}.
     *
     * @param  array<string, mixed>  $options
     */
    public function displayTopologyEdgesV2(string $sourceSerial, string $destSerial, array $options = []): ?EdgeResponseDetails
    {
        return $this->fetch(new DisplayTopologyEdgesV2Request($sourceSerial, $destSerial, $options));
    }

    /**
     * Get list of unreachable devices in a site.: GET /unreachableDevices/{site_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function displayTopologyExpiringDevices(int $siteId, array $options = []): ?UnreachableDeviceList
    {
        return $this->fetch(new DisplayTopologyExpiringDevicesRequest($siteId, $options));
    }

    /**
     * Get details of an uplink.: GET /topology_external_api/uplinks/{source_serial}/{uplink_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function displayTopologyUplinks(string $sourceSerial, string $uplinkId, array $options = []): ?UplinkResponseDetails
    {
        return $this->fetch(new DisplayTopologyUplinksRequest($sourceSerial, $uplinkId, $options));
    }

    /**
     * Get vlan list of a site.: GET /topology_external_api/vlans/{site_id}.
     *
     * @return ListResource<VlanObjectSchema>
     */
    public function displayTopologyVlans(int $siteId): ListResource
    {
        return new ListResource($this->connector, VlanObjectSchema::class, fn (Query $query) => new DisplayTopologyVlansRequest($siteId, $query));
    }
}
