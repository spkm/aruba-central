<?php

namespace spkm\ArubaCentral\Central\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Monitoring\HardwareTrends;
use spkm\ArubaCentral\Central\Data\Monitoring\InterfaceTrends;
use spkm\ArubaCentral\Central\Data\Monitoring\PortUpdate;
use spkm\ArubaCentral\Central\Data\Monitoring\Stack;
use spkm\ArubaCentral\Central\Data\Monitoring\SwitchHardware;
use spkm\ArubaCentral\Central\Data\Monitoring\SwitchItem;
use spkm\ArubaCentral\Central\Data\Monitoring\SwitchLagSummary;
use spkm\ArubaCentral\Central\Data\Monitoring\TopnInterfaceTrends;
use spkm\ArubaCentral\Central\Data\Monitoring\Vsx;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\GetLagSummaryRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\GetSwitchConnectivityrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\GetSwitchesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\GetSwitchHardwareTrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\GetSwitchInterfacePoeRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\GetSwitchRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\GetTopnSwitchConnectivityTrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\GetVsxRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\ListHardwareCategoriesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\ListInterfacesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\ListStackMembersRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\ListVlansRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\UpdateSwitchPortOperationRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Switch API, from Aruba::switches().
 *
 * @extends Builder<SwitchItem>
 */
class SwitchesResource extends Builder
{
    protected string $idField = 'serialNumber';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, SwitchItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSwitchesRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetSwitchRequest((string) $id);
    }

    /**
     * Get LAG summary for a Switch: GET /network-monitoring/v1/switches/{serial-number}/lag.
     *
     * @return ListResource<SwitchLagSummary>
     */
    public function lagSummaryOf(string $serialNumber): ListResource
    {
        return new ListResource($this->connector, SwitchLagSummary::class, fn (Query $query) => new GetLagSummaryRequest($serialNumber, $query));
    }

    /**
     * Get interface trends for a Switch: GET /network-monitoring/v1/switches/{serial-number}/interface-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function interfaceTrendsOf(string $serialNumber, array $options = []): ?InterfaceTrends
    {
        return $this->fetch(new GetSwitchConnectivityrendsRequest($serialNumber, $options));
    }

    /**
     * Get hardware trends for a Switch: GET /network-monitoring/v1/switches/{serial-number}/hardware-trends.
     *
     * @param  array<string, mixed>  $options
     */
    public function hardwareTrendsOf(string $serialNumber, array $options = []): ?HardwareTrends
    {
        return $this->fetch(new GetSwitchHardwareTrendsRequest($serialNumber, $options));
    }

    /**
     * Get interface PoE for a Switch: GET /network-monitoring/v1/switches/{serial-number}/interface-poe.
     *
     * @return ListResource<Data>
     */
    public function interfacePoeOf(string $serialNumber): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new GetSwitchInterfacePoeRequest($serialNumber, $query));
    }

    /**
     * Get Top-N Switch interface trends: GET /network-monitoring/v1/switches/topn-interface-trends.
     *
     * @return ListResource<TopnInterfaceTrends>
     */
    public function topInterfaceTrends(): ListResource
    {
        return new ListResource($this->connector, TopnInterfaceTrends::class, fn (Query $query) => new GetTopnSwitchConnectivityTrendsRequest($query));
    }

    /**
     * Returns VSX details for a specified switch serial number.: GET /network-monitoring/v1/switches/{serial-number}/vsx.
     *
     * @param  array<string, mixed>  $options
     */
    public function vsxOf(string $serialNumber, array $options = []): ?Vsx
    {
        return $this->fetch(new GetVsxRequest($serialNumber, $options));
    }

    /**
     * Get hardware categories for a Switch: GET /network-monitoring/v1/switches/{serial-number}/hardware-categories.
     *
     * @return ListResource<SwitchHardware>
     */
    public function hardwareCategoriesOf(string $serialNumber): ListResource
    {
        return new ListResource($this->connector, SwitchHardware::class, fn (Query $query) => new ListHardwareCategoriesRequest($serialNumber, $query));
    }

    /**
     * Get a list of Switch interfaces: GET /network-monitoring/v1/switches/{serial-number}/interfaces.
     *
     * @return ListResource<Data>
     */
    public function interfacesOf(string $serialNumber): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new ListInterfacesRequest($serialNumber, $query));
    }

    /**
     * Get a list of Stack Members: GET /network-monitoring/v1/stack/{serial-number}/members.
     *
     * @return ListResource<Stack>
     */
    public function stackMembers(string $serialNumber): ListResource
    {
        return new ListResource($this->connector, Stack::class, fn (Query $query) => new ListStackMembersRequest($serialNumber, $query));
    }

    /**
     * Get a list of Switch VLANs: GET /network-monitoring/v1/switches/{serial-number}/vlans.
     *
     * @return ListResource<Data>
     */
    public function vlansOf(string $serialNumber): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new ListVlansRequest($serialNumber, $query));
    }

    /**
     * Update switch port operation: POST /network-monitoring/v1/switches/{serial-number}/update-port.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updatePort(string $serialNumber, array|Data $attributes = [], array $options = []): ?PortUpdate
    {
        return $this->fetch(new UpdateSwitchPortOperationRequest($serialNumber, $this->payloadOf($attributes), $options));
    }
}
