<?php

namespace spkm\ArubaCentral\Classic\Resources\Routing;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Routing\NbrDetailsResp;
use spkm\ArubaCentral\Classic\Data\Routing\NbrRouteAdvtRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\NbrRouteLearnRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\NeighborRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\RouteRespItem;
use spkm\ArubaCentral\Classic\Requests\Routing\Neighbor\GetRoutingV1BgpNeighborDetailRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Neighbor\GetRoutingV1BgpNeighborRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Neighbor\GetRoutingV1BgpNeighborRouteAdvertisedRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Neighbor\GetRoutingV1BgpNeighborRouteLearnedRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Neighbor\GetRoutingV1BgpRouteRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Neighbor\PutRoutingV1BgpNeighborResetRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Neighbor API, from Aruba::routing()->bgp().
 *
 * @extends Builder<NeighborRespItem>
 */
class BgpResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, NeighborRespItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetRoutingV1BgpNeighborRequest($query);
    }

    /**
     * Get BGP neighbor detailed information: GET /routing/v1/bgp/neighbor/detail.
     *
     * @param  array<string, mixed>  $options
     */
    public function getRoutingV1BgpNeighborDetail(string $device, string $address, array $options = []): ?NbrDetailsResp
    {
        return $this->fetch(new GetRoutingV1BgpNeighborDetailRequest($device, $address, $options));
    }

    /**
     * List of routes advertised to a BGP neighbor: GET /routing/v1/bgp/neighbor/route/advertised.
     *
     * @return ListResource<NbrRouteAdvtRespItem>
     */
    public function getRoutingV1BgpNeighborRouteAdvertised(): ListResource
    {
        return new ListResource($this->connector, NbrRouteAdvtRespItem::class, fn (Query $query) => new GetRoutingV1BgpNeighborRouteAdvertisedRequest($query));
    }

    /**
     * List of routes learned form a BGP neighbor: GET /routing/v1/bgp/neighbor/route/learned.
     *
     * @return ListResource<NbrRouteLearnRespItem>
     */
    public function getRoutingV1BgpNeighborRouteLearned(): ListResource
    {
        return new ListResource($this->connector, NbrRouteLearnRespItem::class, fn (Query $query) => new GetRoutingV1BgpNeighborRouteLearnedRequest($query));
    }

    /**
     * List BGP routes: GET /routing/v1/bgp/route.
     *
     * @return ListResource<RouteRespItem>
     */
    public function getRoutingV1BgpRoute(): ListResource
    {
        return new ListResource($this->connector, RouteRespItem::class, fn (Query $query) => new GetRoutingV1BgpRouteRequest($query));
    }

    /**
     * Reset/clear BGP neighbor session: PUT /routing/v1/bgp/neighbor/reset.
     *
     * @param  array<string, mixed>  $options
     */
    public function putRoutingV1BgpNeighborReset(string $device, string $address, array $options = []): mixed
    {
        return $this->fetch(new PutRoutingV1BgpNeighborResetRequest($device, $address, $options));
    }
}
