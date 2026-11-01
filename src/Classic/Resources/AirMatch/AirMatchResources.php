<?php

namespace spkm\ArubaCentral\Classic\Resources\AirMatch;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The AirMatch APIs, from Aruba::airMatch().
 *
 * @extends BaseResource<Data>
 */
class AirMatchResources extends BaseResource
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
     * The Deployer API.
     */
    public function deployer(): DeployerResource
    {
        return new DeployerResource($this->connector);
    }

    /**
     * The Radio API.
     */
    public function radio(): RadioResource
    {
        return new RadioResource($this->connector);
    }

    /**
     * The Radio feasibility API.
     */
    public function radioFeasibility(): RadioFeasibilityResource
    {
        return new RadioFeasibilityResource($this->connector);
    }

    /**
     * The RF domain API.
     */
    public function rfDomains(): RfDomainsResource
    {
        return new RfDomainsResource($this->connector);
    }

    /**
     * The Schedule API.
     */
    public function schedule(): ScheduleResource
    {
        return new ScheduleResource($this->connector);
    }

    /**
     * The Miscellaneous API.
     */
    public function service(): ServiceResource
    {
        return new ServiceResource($this->connector);
    }

    /**
     * The Solution API.
     */
    public function solution(): SolutionResource
    {
        return new SolutionResource($this->connector);
    }

    /**
     * The Telemetry API.
     */
    public function telemetry(): TelemetryResource
    {
        return new TelemetryResource($this->connector);
    }
}
