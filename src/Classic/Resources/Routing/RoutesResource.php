<?php

namespace spkm\ArubaCentral\Classic\Resources\Routing;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Routing\RouteRespItem;
use spkm\ArubaCentral\Classic\Requests\Routing\Route\GetRoutingV0RouteRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Route\GetRoutingV1RouteRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Route API, from Aruba::routing()->routes().
 *
 * @extends Builder<RouteRespItem>
 */
class RoutesResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, RouteRespItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetRoutingV0RouteRequest($query);
    }

    /**
     * Get routes: GET /routing/v1/route.
     *
     * @return ListResource<RouteRespItem>
     */
    public function getRoutingV1Route(): ListResource
    {
        return new ListResource($this->connector, RouteRespItem::class, fn (Query $query) => new GetRoutingV1RouteRequest($query));
    }
}
