<?php

namespace spkm\ArubaCentral\Central\Resources\Troubleshooting;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Troubleshooting APIs, from Aruba::troubleshooting().
 *
 * @extends BaseResource<Data>
 */
class TroubleshootingResources extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * The Access Points API.
     */
    public function accessPoints(string $serialNumber): AccessPointTroubleshootingResource
    {
        return new AccessPointTroubleshootingResource($this->connector, $serialNumber);
    }

    /**
     * The AOS-S Switches API.
     */
    public function aosSwitches(string $serialNumber): AosSwitchTroubleshootingResource
    {
        return new AosSwitchTroubleshootingResource($this->connector, $serialNumber);
    }

    /**
     * The CX Switches API.
     */
    public function cxSwitches(string $serialNumber): CxSwitchTroubleshootingResource
    {
        return new CxSwitchTroubleshootingResource($this->connector, $serialNumber);
    }

    /**
     * The Troubleshooting Operations API.
     */
    public function deviceOperations(): DeviceOperationsResource
    {
        return new DeviceOperationsResource($this->connector);
    }

    /**
     * The Events API.
     */
    public function events(): EventsResource
    {
        return new EventsResource($this->connector);
    }

    /**
     * The Gateways API.
     */
    public function gateways(string $serialNumber): GatewayTroubleshootingResource
    {
        return new GatewayTroubleshootingResource($this->connector, $serialNumber);
    }

    /**
     * The Telemetry Data API.
     */
    public function telemetry(): TelemetryResource
    {
        return new TelemetryResource($this->connector);
    }
}
