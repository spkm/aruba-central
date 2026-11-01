<?php

namespace spkm\ArubaCentral\Classic\Resources\Routing;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Routing\AreaRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\DatabaseRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\InterfaceRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\NeighborRespItem;
use spkm\ArubaCentral\Classic\Requests\Routing\Area\GetRoutingV1OspfAreaRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Area\GetRoutingV1OspfDatabaseRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Area\GetRoutingV1OspfInterfaceRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Area\GetRoutingV1OspfNeighborRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Area API, from Aruba::routing()->ospf().
 *
 * @extends Builder<AreaRespItem>
 */
class OspfResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, AreaRespItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetRoutingV1OspfAreaRequest($query);
    }

    /**
     * List OSPF Link State Database Information: GET /routing/v1/ospf/database.
     *
     * @return ListResource<DatabaseRespItem>
     */
    public function getRoutingV1OspfDatabase(): ListResource
    {
        return new ListResource($this->connector, DatabaseRespItem::class, fn (Query $query) => new GetRoutingV1OspfDatabaseRequest($query));
    }

    /**
     * List OSPF Interface Information: GET /routing/v1/ospf/interface.
     *
     * @return ListResource<InterfaceRespItem>
     */
    public function getRoutingV1OspfInterface(): ListResource
    {
        return new ListResource($this->connector, InterfaceRespItem::class, fn (Query $query) => new GetRoutingV1OspfInterfaceRequest($query));
    }

    /**
     * List OSPF neighbor Information: GET /routing/v1/ospf/neighbor.
     *
     * @return ListResource<NeighborRespItem>
     */
    public function getRoutingV1OspfNeighbor(): ListResource
    {
        return new ListResource($this->connector, NeighborRespItem::class, fn (Query $query) => new GetRoutingV1OspfNeighborRequest($query));
    }
}
