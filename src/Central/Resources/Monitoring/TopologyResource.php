<?php

namespace spkm\ArubaCentral\Central\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Monitoring\IsolatedNodes;
use spkm\ArubaCentral\Central\Data\Monitoring\LinksDetail;
use spkm\ArubaCentral\Central\Data\Monitoring\Neighbours;
use spkm\ArubaCentral\Central\Data\Monitoring\Topology;
use spkm\ArubaCentral\Central\Data\Monitoring\UnmanagedDevice;
use spkm\ArubaCentral\Central\Requests\Monitoring\Topology\GetDeviceNeighbourLinkRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Topology\GetIsolatedNodesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Topology\GetLinkTopologyRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Topology\GetNeighboursRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Topology\GetUnmanagedDeviceRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

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
     * Returns link details between a device and one of its neighbours.: GET /network-monitoring/v1/devices/{serial-number}/neighbours/{neighbour-serial-number}.
     *
     * @param  array<string, mixed>  $options
     */
    public function neighbourLink(string $serialNumber, string $neighbourSerialNumber, array $options = []): ?LinksDetail
    {
        return $this->fetch(new GetDeviceNeighbourLinkRequest($serialNumber, $neighbourSerialNumber, $options));
    }

    /**
     * Returns isolated devices for the given site.: GET /network-monitoring/v1/isolated-devices/{site-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function isolatedDevices(string $siteId, array $options = []): ?IsolatedNodes
    {
        return $this->fetch(new GetIsolatedNodesRequest($siteId, $options));
    }

    /**
     * Returns topology details for the given site.: GET /network-monitoring/v1/topology/{site-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function forSite(string $siteId, array $options = []): ?Topology
    {
        return $this->fetch(new GetLinkTopologyRequest($siteId, $options));
    }

    /**
     * Returns details of neighbor devices for a given serial number.: GET /network-monitoring/v1/neighbours/{serial-number}.
     *
     * @param  array<string, mixed>  $options
     */
    public function neighbours(string $serialNumber, array $options = []): ?Neighbours
    {
        return $this->fetch(new GetNeighboursRequest($serialNumber, $options));
    }

    /**
     * Returns details for an unmanaged device of a given site.: GET /network-monitoring/v1/unmanaged-device/{mac-address}.
     *
     * @param  array<string, mixed>  $options
     */
    public function unmanagedDevice(string $macAddress, string $siteId, array $options = []): ?UnmanagedDevice
    {
        return $this->fetch(new GetUnmanagedDeviceRequest($macAddress, $siteId, $options));
    }
}
