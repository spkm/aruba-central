<?php

namespace spkm\ArubaCentral\Classic\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Monitoring APIs, from Aruba::monitoring().
 *
 * @extends BaseResource<Data>
 */
class MonitoringResources extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * The AP API.
     */
    public function accessPoints(): AccessPointsResource
    {
        return new AccessPointsResource($this->connector);
    }

    /**
     * The Client API.
     */
    public function clients(): ClientsResource
    {
        return new ClientsResource($this->connector);
    }

    /**
     * The Events API.
     */
    public function events(): EventsResource
    {
        return new EventsResource($this->connector);
    }

    /**
     * The Gateway API.
     */
    public function gateways(): GatewaysResource
    {
        return new GatewaysResource($this->connector);
    }

    /**
     * The Label API.
     */
    public function labels(): LabelsResource
    {
        return new LabelsResource($this->connector);
    }

    /**
     * The MobilityController API.
     */
    public function mobilityControllers(): MobilityControllersResource
    {
        return new MobilityControllersResource($this->connector);
    }

    /**
     * The Network API.
     */
    public function networks(): NetworksResource
    {
        return new NetworksResource($this->connector);
    }

    /**
     * The Site API.
     */
    public function sites(): SitesResource
    {
        return new SitesResource($this->connector);
    }

    /**
     * The Swarm API.
     */
    public function swarms(): SwarmsResource
    {
        return new SwarmsResource($this->connector);
    }

    /**
     * The Switch API.
     */
    public function switches(): SwitchesResource
    {
        return new SwitchesResource($this->connector);
    }

    /**
     * The VPN API.
     */
    public function vpn(): VpnResource
    {
        return new VpnResource($this->connector);
    }
}
