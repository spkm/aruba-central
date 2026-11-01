<?php

namespace spkm\ArubaCentral\Classic\Resources\Routing;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Routing\InterfaceRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\NbrRouteRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\NeighborRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\RouteRespItem;
use spkm\ArubaCentral\Classic\Requests\Routing\Neighbor\GetRoutingV1RipInterfaceRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Neighbor\GetRoutingV1RipNeighborRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Neighbor\GetRoutingV1RipNeighborRouteRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Neighbor\GetRoutingV1RipRouteRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Neighbor API, from Aruba::routing()->rip().
 *
 * @extends Builder<NeighborRespItem>
 */
class RipResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, NeighborRespItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetRoutingV1RipNeighborRequest($query);
    }

    /**
     * List RIP interfaces: GET /routing/v1/rip/interface.
     *
     * @return ListResource<InterfaceRespItem>
     */
    public function getRoutingV1RipInterface(): ListResource
    {
        return new ListResource($this->connector, InterfaceRespItem::class, fn (Query $query) => new GetRoutingV1RipInterfaceRequest($query));
    }

    /**
     * List of routes learned from a RIP neighbor: GET /routing/v1/rip/neighbor/route.
     *
     * @return ListResource<NbrRouteRespItem>
     */
    public function getRoutingV1RipNeighborRoute(): ListResource
    {
        return new ListResource($this->connector, NbrRouteRespItem::class, fn (Query $query) => new GetRoutingV1RipNeighborRouteRequest($query));
    }

    /**
     * List RIP routes: GET /routing/v1/rip/route.
     *
     * @return ListResource<RouteRespItem>
     */
    public function getRoutingV1RipRoute(): ListResource
    {
        return new ListResource($this->connector, RouteRespItem::class, fn (Query $query) => new GetRoutingV1RipRouteRequest($query));
    }
}
