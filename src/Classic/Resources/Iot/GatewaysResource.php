<?php

namespace spkm\ArubaCentral\Classic\Resources\Iot;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Iot\CollectorAssociationTokenResp;
use spkm\ArubaCentral\Classic\Data\Iot\GroupConnResp;
use spkm\ArubaCentral\Classic\Data\Iot\IotGateway;
use spkm\ArubaCentral\Classic\Data\Iot\ReporterConnAssocAddDeleteResp;
use spkm\ArubaCentral\Classic\Data\Iot\ReporterConnectorAssocResp;
use spkm\ArubaCentral\Classic\Data\Iot\ResponseMsg;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\AddAssociationRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\DeleteAssociationRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\DeleteGatewayRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\GetAllAssociationRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\GetAllGatewaysRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\GetAllOnlineGatewaysRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\GetAssociationForCollectorRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\GetAssociationTokenForCollectorRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\GetGatewayRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\GetGroupForConnectorRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\MoveRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The iot_gateways API, from Aruba::iot()->gateways().
 *
 * @extends Builder<IotGateway>
 */
class GatewaysResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, IotGateway::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAllGatewaysRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetGatewayRequest((string) $id);
    }

    /**
     * Add Association: POST /v1/iot_gateways/association.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function addAssociation(array|Data $attributes = [], array $options = []): ?ReporterConnAssocAddDeleteResp
    {
        return $this->fetch(new AddAssociationRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Delete Association: DELETE /v1/iot_gateways/association.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deleteAssociation(array|Data $attributes = [], array $options = []): ?ReporterConnAssocAddDeleteResp
    {
        return $this->fetch(new DeleteAssociationRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Group move: DELETE /v1/iot_gateways/groups/move.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deleteGateway(array|Data $attributes = [], array $options = []): ?ResponseMsg
    {
        return $this->fetch(new DeleteGatewayRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Return Pageable List of Gateways: GET /v1/iot_gateways/association.
     *
     * @return ListResource<ReporterConnectorAssocResp>
     */
    public function getAllAssociation(): ListResource
    {
        return new ListResource($this->connector, ReporterConnectorAssocResp::class, fn (Query $query) => new GetAllAssociationRequest($query));
    }

    /**
     * Return Pageable List of Gateways: GET /v1/iot_gateways/online.
     *
     * @return ListResource<IotGateway>
     */
    public function getAllOnlineGateways(): ListResource
    {
        return new ListResource($this->connector, IotGateway::class, fn (Query $query) => new GetAllOnlineGatewaysRequest($query));
    }

    /**
     * Return Pageable List of Gateways: GET /v1/iot_gateways/association/collector/{collectorId}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAssociationForCollector(string $collectorId, array $options = []): ?ReporterConnectorAssocResp
    {
        return $this->fetch(new GetAssociationForCollectorRequest($collectorId, $options));
    }

    /**
     * Returns security token associated with a collector: GET /v1/iot_gateways/association/token/{collectorId}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAssociationTokenForCollector(string $collectorId, array $options = []): ?CollectorAssociationTokenResp
    {
        return $this->fetch(new GetAssociationTokenForCollectorRequest($collectorId, $options));
    }

    /**
     * Returns connector to group mapping: GET /v1/iot_gateways/groups/connector/{connectorId}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGroupForConnector(string $connectorId, array $options = []): ?GroupConnResp
    {
        return $this->fetch(new GetGroupForConnectorRequest($connectorId, $options));
    }

    /**
     * Group move: POST /v1/iot_gateways/groups/move.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function move(array|Data $attributes = [], array $options = []): ?ResponseMsg
    {
        return $this->fetch(new MoveRequest($this->payloadOf($attributes), $options));
    }
}
