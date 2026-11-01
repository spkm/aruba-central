<?php

namespace spkm\ArubaCentral\Central\Resources\Services;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Services\ApCoveragePlan;
use spkm\ArubaCentral\Central\Data\Services\ApInfo;
use spkm\ArubaCentral\Central\Data\Services\ApNeighborList;
use spkm\ArubaCentral\Central\Data\Services\ApRadioRelations;
use spkm\ArubaCentral\Central\Data\Services\BoardLimit;
use spkm\ArubaCentral\Central\Data\Services\ConfigId;
use spkm\ArubaCentral\Central\Data\Services\DeviceConfig;
use spkm\ArubaCentral\Central\Data\Services\History;
use spkm\ArubaCentral\Central\Data\Services\NonFriends;
use spkm\ArubaCentral\Central\Data\Services\Partition;
use spkm\ArubaCentral\Central\Data\Services\PartitionResponse;
use spkm\ArubaCentral\Central\Data\Services\Pathloss;
use spkm\ArubaCentral\Central\Data\Services\PrioRfEvents;
use spkm\ArubaCentral\Central\Data\Services\RadioFeasibility;
use spkm\ArubaCentral\Central\Data\Services\RadioInfo;
use spkm\ArubaCentral\Central\Data\Services\RadioPartition;
use spkm\ArubaCentral\Central\Data\Services\RfEvents;
use spkm\ArubaCentral\Central\Data\Services\RunnowResponse;
use spkm\ArubaCentral\Central\Data\Services\ServiceConfig;
use spkm\ArubaCentral\Central\Data\Services\Solution;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\CreateRfPartitionsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetApCoveragePlansRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetApInfoRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetApNeighborsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetApRadioRelationsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetDeviceConfigRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetGlobalConfigIdRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetNonFriendsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetPathlossRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetPriorityRfEventsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetRadioBoardLimitsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetRadioFeasibilityRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetRadioHistoryRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetRadioInfoRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetRadioPartitionRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetRadioSolutionRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetRfEventsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetServiceConfigRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\ListAllApCoveragePlansRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\ListAllSolutionsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\ListApInfoRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\ListPriorityRfEventsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\ListRadioFeasibilityRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\ListRadioInfoRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\ListRfEventsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\ListRfPartitionsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\RunSolutionOptimizationRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The AirMatch API, from Aruba::airMatch().
 *
 * @extends BaseResource<Data>
 */
class AirMatchResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Send RF Partition Request to Airmatch: POST /network-services/v1/airmatch-partitions.
     *
     * @param  array<string, mixed>  $options
     */
    public function createRfPartitions(array $options = []): ?PartitionResponse
    {
        return $this->fetch(new CreateRfPartitionsRequest($options));
    }

    /**
     * Get ap coverage plan for a given AP serial number: GET /network-services/v1/airmatch-ap-coverage-plans/{serial-number}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getApCoveragePlans(string $serialNumber, array $options = []): ?ApCoveragePlan
    {
        return $this->fetch(new GetApCoveragePlansRequest($serialNumber, $options));
    }

    /**
     * Get AP information of a specific AP Ethernet MAC: GET /network-services/v1/airmatch-aps/{serial-number}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getApInfo(string $serialNumber, array $options = []): ?ApInfo
    {
        return $this->fetch(new GetApInfoRequest($serialNumber, $options));
    }

    /**
     * Get list of AP neighbors for a given AP serial number: GET /network-services/v1/airmatch-ap-neighbor-list/{serial-number}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getApNeighbors(string $serialNumber, array $options = []): ?ApNeighborList
    {
        return $this->fetch(new GetApNeighborsRequest($serialNumber, $options));
    }

    /**
     * Get AP radio relations from edge document: GET /network-services/v1/airmatch-ap-radio-relations/{serial-number}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getApRadioRelations(string $serialNumber, array $options = []): ?ApRadioRelations
    {
        return $this->fetch(new GetApRadioRelationsRequest($serialNumber, $options));
    }

    /**
     * Returns Device (AP) Configuration for a specific AP Serial number: GET /network-services/v1/airmatch-device-config/{serial-number}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDeviceConfig(string $serialNumber, array $options = []): ?DeviceConfig
    {
        return $this->fetch(new GetDeviceConfigRequest($serialNumber, $options));
    }

    /**
     * Returns the global configuration ID for the tenant: GET /network-services/v1/airmatch-global-config-id.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGlobalConfigId(array $options = []): ?ConfigId
    {
        return $this->fetch(new GetGlobalConfigIdRequest($options));
    }

    /**
     * Get list of non friend (non-neighbor) radios for that radio mac: GET /network-services/v1/airmatch-non-friend/{radio-mac}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getNonFriends(string $radioMac, array $options = []): ?NonFriends
    {
        return $this->fetch(new GetNonFriendsRequest($radioMac, $options));
    }

    /**
     * Get all neighbor pathloss for a tenant and radio mac: GET /network-services/v1/airmatch-pathloss/{radio-mac}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getPathloss(string $radioMac, array $options = []): ?Pathloss
    {
        return $this->fetch(new GetPathlossRequest($radioMac, $options));
    }

    /**
     * Get radar and noise RF events of a specific Radio MAC: GET /network-services/v1/airmatch-priority-rf-events/{radio-mac}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getPriorityRfEvents(string $radioMac, array $options = []): ?PrioRfEvents
    {
        return $this->fetch(new GetPriorityRfEventsRequest($radioMac, $options));
    }

    /**
     * Get board limits of a specific radio MAC for a given tenant: GET /network-services/v1/airmatch-board-limits/{serial-number}/radios/{radio-mac}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getRadioBoardLimits(string $serialNumber, string $radioMac, array $options = []): ?BoardLimit
    {
        return $this->fetch(new GetRadioBoardLimitsRequest($serialNumber, $radioMac, $options));
    }

    /**
     * Get radio feasibility of a specific radio MAC: GET /network-services/v1/airmatch-radio-feasibility/{radio-mac}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getRadioFeasibility(string $radioMac, array $options = []): ?RadioFeasibility
    {
        return $this->fetch(new GetRadioFeasibilityRequest($radioMac, $options));
    }

    /**
     * Get radio history of a specific Radio MAC: GET /network-services/v1/airmatch-history/{radio-mac}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getRadioHistory(string $radioMac, array $options = []): ?History
    {
        return $this->fetch(new GetRadioHistoryRequest($radioMac, $options));
    }

    /**
     * Get reporting radio information of a specific radio MAC: GET /network-services/v1/airmatch-radios/{radio-mac}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getRadioInfo(string $radioMac, array $options = []): ?RadioInfo
    {
        return $this->fetch(new GetRadioInfoRequest($radioMac, $options));
    }

    /**
     * Get rf domain and partition id for a specific radio mac address: GET /network-services/v1/airmatch-radio-partition/{radio-mac}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getRadioPartition(string $radioMac, array $options = []): ?RadioPartition
    {
        return $this->fetch(new GetRadioPartitionRequest($radioMac, $options));
    }

    /**
     * Get solution of a specific Radio MAC: GET /network-services/v1/airmatch-solutions/{radio-mac}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getRadioSolution(string $radioMac, array $options = []): ?Solution
    {
        return $this->fetch(new GetRadioSolutionRequest($radioMac, $options));
    }

    /**
     * Get RF events of a specific Radio MAC: GET /network-services/v1/airmatch-rf-events/{radio-mac}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getRfEvents(string $radioMac, array $options = []): ?RfEvents
    {
        return $this->fetch(new GetRfEventsRequest($radioMac, $options));
    }

    /**
     * Returns Device (AP) Running Configuration: GET /network-services/v1/airmatch-service-config.
     *
     * @param  array<string, mixed>  $options
     */
    public function getServiceConfig(array $options = []): ?ServiceConfig
    {
        return $this->fetch(new GetServiceConfigRequest($options));
    }

    /**
     * Get all AP coverage plan from collection: GET /network-services/v1/airmatch-ap-coverage-plans.
     *
     * @return ListResource<ApCoveragePlan>
     */
    public function listAllApCoveragePlans(): ListResource
    {
        return new ListResource($this->connector, ApCoveragePlan::class, fn (Query $query) => new ListAllApCoveragePlansRequest($query));
    }

    /**
     * Get solver optimizations for a given tenant: GET /network-services/v1/airmatch-solutions.
     *
     * @return ListResource<Solution>
     */
    public function listAllSolutions(): ListResource
    {
        return new ListResource($this->connector, Solution::class, fn (Query $query) => new ListAllSolutionsRequest($query));
    }

    /**
     * Get AP information for all APs of a tenant: GET /network-services/v1/airmatch-aps.
     *
     * @return ListResource<ApInfo>
     */
    public function listApInfo(): ListResource
    {
        return new ListResource($this->connector, ApInfo::class, fn (Query $query) => new ListApInfoRequest($query));
    }

    /**
     * Get all radar and noise RF events of a tenant: GET /network-services/v1/airmatch-priority-rf-events.
     *
     * @return ListResource<PrioRfEvents>
     */
    public function listPriorityRfEvents(): ListResource
    {
        return new ListResource($this->connector, PrioRfEvents::class, fn (Query $query) => new ListPriorityRfEventsRequest($query));
    }

    /**
     * Get all radio feasibility for a tenant: GET /network-services/v1/airmatch-radio-feasibility.
     *
     * @return ListResource<RadioFeasibility>
     */
    public function listRadioFeasibility(): ListResource
    {
        return new ListResource($this->connector, RadioFeasibility::class, fn (Query $query) => new ListRadioFeasibilityRequest($query));
    }

    /**
     * Get all radios for a tenant or radios based on AP Serial: GET /network-services/v1/airmatch-radios.
     *
     * @return ListResource<RadioInfo>
     */
    public function listRadioInfo(): ListResource
    {
        return new ListResource($this->connector, RadioInfo::class, fn (Query $query) => new ListRadioInfoRequest($query));
    }

    /**
     * Get all RF events of a tenant: GET /network-services/v1/airmatch-rf-events.
     *
     * @return ListResource<RfEvents>
     */
    public function listRfEvents(): ListResource
    {
        return new ListResource($this->connector, RfEvents::class, fn (Query $query) => new ListRfEventsRequest($query));
    }

    /**
     * Get RF partition information: GET /network-services/v1/airmatch-partitions.
     *
     * @param  array<string, mixed>  $options
     */
    public function listRfPartitions(array $options = []): ?Partition
    {
        return $this->fetch(new ListRfPartitionsRequest($options));
    }

    /**
     * Sends an optimization request to Airmatch to compute and deploy a solution: POST /network-services/v1/airmatch-solutions/run-now.
     *
     * @param  array<string, mixed>  $options
     */
    public function runSolutionOptimization(string $runmode, array $options = []): ?RunnowResponse
    {
        return $this->fetch(new RunSolutionOptimizationRequest($runmode, $options));
    }
}
