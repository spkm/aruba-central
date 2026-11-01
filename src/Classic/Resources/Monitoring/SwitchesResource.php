<?php

namespace spkm\ArubaCentral\Classic\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Monitoring\Bandwidth;
use spkm\ArubaCentral\Classic\Data\Monitoring\ChassisInfo;
use spkm\ArubaCentral\Classic\Data\Monitoring\CXPortDetail;
use spkm\ArubaCentral\Classic\Data\Monitoring\CXPortPoeInfo;
use spkm\ArubaCentral\Classic\Data\Monitoring\CXStackPortList;
use spkm\ArubaCentral\Classic\Data\Monitoring\CXSwitchPortsPoeList;
use spkm\ArubaCentral\Classic\Data\Monitoring\CXSwitchStackVlanItem;
use spkm\ArubaCentral\Classic\Data\Monitoring\DeviceNeighborsRootItem;
use spkm\ArubaCentral\Classic\Data\Monitoring\Errors;
use spkm\ArubaCentral\Classic\Data\Monitoring\PortPoeInfo;
use spkm\ArubaCentral\Classic\Data\Monitoring\StackDetail;
use spkm\ArubaCentral\Classic\Data\Monitoring\SwitchListSingle;
use spkm\ArubaCentral\Classic\Data\Monitoring\SwitchPortsPoeList;
use spkm\ArubaCentral\Classic\Data\Monitoring\SwitchStackVlanItem;
use spkm\ArubaCentral\Classic\Data\Monitoring\SWPortDetail;
use spkm\ArubaCentral\Classic\Data\Monitoring\TopNSwitch;
use spkm\ArubaCentral\Classic\Data\Monitoring\VSXInfo;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\DeleteSwitchRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\DeleteSwitchStackRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetBandwidthUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetBandwidthUsageTopnRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetChassisInfoRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetCxPortsErrorsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetCxStackPortsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetCxSwitchNeighborsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetCxSwitchPoeDetailRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetCxSwitchPoeDetailsForAllPortsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetCxSwitchPortsBandwidthUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetCxSwitchPortsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetCxSwitchStackNeighborsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetCxSwitchStackVlanRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetCxSwitchVlanRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetPortsErrorsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetStackPortsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchesRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchPoeDetailRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchPoeDetailsForAllPortsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchPortsBandwidthUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchPortsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchStackRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchStacksRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchStackVlanRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchVlanRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchVsxDetailRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Switch API, from Aruba::monitoring()->switches().
 *
 * @extends Builder<SwitchListSingle>
 */
class SwitchesResource extends Builder
{
    protected string $idField = 'serial';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, SwitchListSingle::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSwitchesRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetSwitchRequest((string) $id);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteSwitchRequest((string) $id, $options);
    }

    /**
     * Delete Switch Stack: DELETE /monitoring/v1/switch_stacks/{stack_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteSwitchStack(string $stackId, array $options = []): mixed
    {
        return $this->fetch(new DeleteSwitchStackRequest($stackId, $options));
    }

    /**
     * Switch Bandwidth Usage: GET /monitoring/v1/switches/bandwidth_usage.
     *
     * @return ListResource<Bandwidth>
     */
    public function bandwidthUsage(): ListResource
    {
        return new ListResource($this->connector, Bandwidth::class, fn (Query $query) => new GetBandwidthUsageRequest($query));
    }

    /**
     * Top N Switches: GET /monitoring/v1/switches/bandwidth_usage/topn.
     *
     * @return ListResource<TopNSwitch>
     */
    public function topByBandwidth(): ListResource
    {
        return new ListResource($this->connector, TopNSwitch::class, fn (Query $query) => new GetBandwidthUsageTopnRequest($query));
    }

    /**
     * Switch Chassis Details: GET /monitoring/v1/switches/{serial}/chassis_info.
     *
     * @param  array<string, mixed>  $options
     */
    public function getChassisInfo(string $serial, array $options = []): ?ChassisInfo
    {
        return $this->fetch(new GetChassisInfoRequest($serial, $options));
    }

    /**
     * CX Switch Ports Errors: GET /monitoring/v1/cx_switches/{serial}/ports/errors.
     *
     * @return ListResource<Errors>
     */
    public function getCxPortsErrors(string $serial): ListResource
    {
        return new ListResource($this->connector, Errors::class, fn (Query $query) => new GetCxPortsErrorsRequest($serial, $query));
    }

    /**
     * CX Switch Stack Port Details: GET /monitoring/v1/cx_switch_stacks/{stack_id}/ports.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCxStackPorts(string $stackId, array $options = []): ?CXStackPortList
    {
        return $this->fetch(new GetCxStackPortsRequest($stackId, $options));
    }

    /**
     * Get lldp device neighbor info for CX switch: GET /monitoring/v1/cx_switches/{serial}/neighbors.
     *
     * @return ListResource<DeviceNeighborsRootItem>
     */
    public function getCxSwitchNeighbors(string $serial): ListResource
    {
        return new ListResource($this->connector, DeviceNeighborsRootItem::class, fn (Query $query) => new GetCxSwitchNeighborsRequest($serial, $query));
    }

    /**
     * Get switch port poe info for CX switch: GET /monitoring/v1/cx_switches/{serial}/poe_detail.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCxSwitchPoeDetail(string $serial, string $port, array $options = []): ?CXPortPoeInfo
    {
        return $this->fetch(new GetCxSwitchPoeDetailRequest($serial, $port, $options));
    }

    /**
     * Get switch poe info for CX switch: GET /monitoring/v1/cx_switches/{serial}/poe_details.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCxSwitchPoeDetailsForAllPorts(string $serial, array $options = []): ?CXSwitchPortsPoeList
    {
        return $this->fetch(new GetCxSwitchPoeDetailsForAllPortsRequest($serial, $options));
    }

    /**
     * Get ports details for CX switch: GET /monitoring/v1/cx_switches/{serial}/ports.
     *
     * @return ListResource<CXPortDetail>
     */
    public function getCxSwitchPorts(string $serial): ListResource
    {
        return new ListResource($this->connector, CXPortDetail::class, fn (Query $query) => new GetCxSwitchPortsRequest($serial, $query));
    }

    /**
     * Ports Bandwidth Usage for CX Switch: GET /monitoring/v1/cx_switches/{serial}/ports/bandwidth_usage.
     *
     * @return ListResource<Bandwidth>
     */
    public function getCxSwitchPortsBandwidthUsage(string $serial): ListResource
    {
        return new ListResource($this->connector, Bandwidth::class, fn (Query $query) => new GetCxSwitchPortsBandwidthUsageRequest($serial, $query));
    }

    /**
     * Get lldp device neighbor info for CX switch stack: GET /monitoring/v1/cx_switch_stacks/{stack_id}/neighbors.
     *
     * @return ListResource<DeviceNeighborsRootItem>
     */
    public function getCxSwitchStackNeighbors(string $stackId): ListResource
    {
        return new ListResource($this->connector, DeviceNeighborsRootItem::class, fn (Query $query) => new GetCxSwitchStackNeighborsRequest($stackId, $query));
    }

    /**
     * Get vlan info of the CX switch stack: GET /monitoring/v1/cx_switch_stacks/{stack_id}/vlan.
     *
     * @return ListResource<CXSwitchStackVlanItem>
     */
    public function getCxSwitchStackVlan(string $stackId): ListResource
    {
        return new ListResource($this->connector, CXSwitchStackVlanItem::class, fn (Query $query) => new GetCxSwitchStackVlanRequest($stackId, $query));
    }

    /**
     * Get vlan info for CX switch: GET /monitoring/v1/cx_switches/{serial}/vlan.
     *
     * @return ListResource<CXSwitchStackVlanItem>
     */
    public function getCxSwitchVlan(string $serial): ListResource
    {
        return new ListResource($this->connector, CXSwitchStackVlanItem::class, fn (Query $query) => new GetCxSwitchVlanRequest($serial, $query));
    }

    /**
     * Switch Ports Errors: GET /monitoring/v1/switches/{serial}/ports/errors.
     *
     * @return ListResource<Errors>
     */
    public function getPortsErrors(string $serial): ListResource
    {
        return new ListResource($this->connector, Errors::class, fn (Query $query) => new GetPortsErrorsRequest($serial, $query));
    }

    /**
     * Switch Stack Port Details: GET /monitoring/v1/switch_stacks/{stack_id}/ports.
     *
     * @return ListResource<SWPortDetail>
     */
    public function getStackPorts(string $stackId): ListResource
    {
        return new ListResource($this->connector, SWPortDetail::class, fn (Query $query) => new GetStackPortsRequest($stackId, $query));
    }

    /**
     * Get switch port poe info: GET /monitoring/v1/switches/{serial}/poe_detail.
     *
     * @param  array<string, mixed>  $options
     */
    public function getSwitchPoeDetail(string $serial, array $options = []): ?PortPoeInfo
    {
        return $this->fetch(new GetSwitchPoeDetailRequest($serial, $options));
    }

    /**
     * Get switch poe info: GET /monitoring/v1/switches/{serial}/poe_details.
     *
     * @param  array<string, mixed>  $options
     */
    public function getSwitchPoeDetailsForAllPorts(string $serial, array $options = []): ?SwitchPortsPoeList
    {
        return $this->fetch(new GetSwitchPoeDetailsForAllPortsRequest($serial, $options));
    }

    /**
     * Switch Ports Details: GET /monitoring/v1/switches/{serial}/ports.
     *
     * @return ListResource<SWPortDetail>
     */
    public function getSwitchPorts(string $serial): ListResource
    {
        return new ListResource($this->connector, SWPortDetail::class, fn (Query $query) => new GetSwitchPortsRequest($serial, $query));
    }

    /**
     * Switch Ports Bandwidth Usage: GET /monitoring/v1/switches/{serial}/ports/bandwidth_usage.
     *
     * @return ListResource<Bandwidth>
     */
    public function getSwitchPortsBandwidthUsage(string $serial): ListResource
    {
        return new ListResource($this->connector, Bandwidth::class, fn (Query $query) => new GetSwitchPortsBandwidthUsageRequest($serial, $query));
    }

    /**
     * Switch Stack Details: GET /monitoring/v1/switch_stacks/{stack_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getSwitchStack(string $stackId, array $options = []): ?StackDetail
    {
        return $this->fetch(new GetSwitchStackRequest($stackId, $options));
    }

    /**
     * Get vlan info of the switch stack: GET /monitoring/v1/switch_stacks/{stack_id}/vlan.
     *
     * @return ListResource<SwitchStackVlanItem>
     */
    public function getSwitchStackVlan(string $stackId): ListResource
    {
        return new ListResource($this->connector, SwitchStackVlanItem::class, fn (Query $query) => new GetSwitchStackVlanRequest($stackId, $query));
    }

    /**
     * List Switch Stacks: GET /monitoring/v1/switch_stacks.
     *
     * @return ListResource<StackDetail>
     */
    public function getSwitchStacks(): ListResource
    {
        return new ListResource($this->connector, StackDetail::class, fn (Query $query) => new GetSwitchStacksRequest($query));
    }

    /**
     * Get vlan info of the switch: GET /monitoring/v1/switches/{serial}/vlan.
     *
     * @return ListResource<SwitchStackVlanItem>
     */
    public function getSwitchVlan(string $serial): ListResource
    {
        return new ListResource($this->connector, SwitchStackVlanItem::class, fn (Query $query) => new GetSwitchVlanRequest($serial, $query));
    }

    /**
     * Get switch vsx info for CX switch: GET /monitoring/v1/cx_switches/{serial}/vsx.
     *
     * @param  array<string, mixed>  $options
     */
    public function getSwitchVsxDetail(string $serial, array $options = []): ?VSXInfo
    {
        return $this->fetch(new GetSwitchVsxDetailRequest($serial, $options));
    }
}
