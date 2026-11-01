<?php

namespace spkm\ArubaCentral\Classic\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Monitoring\Bandwidth;
use spkm\ArubaCentral\Classic\Data\Monitoring\GatewayVLANInfoItem;
use spkm\ArubaCentral\Classic\Data\Monitoring\MC;
use spkm\ArubaCentral\Classic\Data\Monitoring\PortDetail;
use spkm\ArubaCentral\Classic\Requests\Monitoring\MobilityController\DeleteMcRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\MobilityController\GetMcPortsBandwidthUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\MobilityController\GetMcPortsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\MobilityController\GetMcRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\MobilityController\GetMcsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\MobilityController\GetVlanInfoRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The MobilityController API, from Aruba::monitoring()->mobilityControllers().
 *
 * @extends Builder<MC>
 */
class MobilityControllersResource extends Builder
{
    protected string $idField = 'serial';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, MC::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetMcsRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetMcRequest((string) $id);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteMcRequest((string) $id, $options);
    }

    /**
     * Mobility Controllers Ports Details: GET /monitoring/v1/mobility_controllers/{serial}/ports.
     *
     * @return ListResource<PortDetail>
     */
    public function getMcPorts(string $serial): ListResource
    {
        return new ListResource($this->connector, PortDetail::class, fn (Query $query) => new GetMcPortsRequest($serial, $query));
    }

    /**
     * Mobility Controllers Ports Bandwidth Usage: GET /monitoring/v1/mobility_controllers/{serial}/ports/bandwidth_usage.
     *
     * @return ListResource<Bandwidth>
     */
    public function getMcPortsBandwidthUsage(string $serial): ListResource
    {
        return new ListResource($this->connector, Bandwidth::class, fn (Query $query) => new GetMcPortsBandwidthUsageRequest($serial, $query));
    }

    /**
     * Mobility Controllers VLAN details: GET /monitoring/v1/mobility_controllers/{serial}/vlan.
     *
     * @return ListResource<GatewayVLANInfoItem>
     */
    public function getVlanInfo(string $serial): ListResource
    {
        return new ListResource($this->connector, GatewayVLANInfoItem::class, fn (Query $query) => new GetVlanInfoRequest($serial, $query));
    }
}
