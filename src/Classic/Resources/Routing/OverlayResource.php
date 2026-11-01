<?php

namespace spkm\ArubaCentral\Classic\Resources\Routing;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Routing\AdvtRouteRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\BestRecvRouteRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\ConnRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\InterfaceRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\RecvRouteRespItem;
use spkm\ArubaCentral\Classic\Requests\Routing\Connection\GetRoutingV1OverlayConnectionRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Connection\GetRoutingV1OverlayInterfaceRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Connection\GetRoutingV1OverlayRouteAdvertisedRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Connection\GetRoutingV1OverlayRouteLearnedBestRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Connection\GetRoutingV1OverlayRouteLearnedRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Connection\PutRoutingV1OverlayConnectionResetRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Connection API, from Aruba::routing()->overlay().
 *
 * @extends Builder<ConnRespItem>
 */
class OverlayResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, ConnRespItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetRoutingV1OverlayConnectionRequest($query);
    }

    /**
     * List of overlay interfaces (tunnels): GET /routing/v1/overlay/interface.
     *
     * @return ListResource<InterfaceRespItem>
     */
    public function getRoutingV1OverlayInterface(): ListResource
    {
        return new ListResource($this->connector, InterfaceRespItem::class, fn (Query $query) => new GetRoutingV1OverlayInterfaceRequest($query));
    }

    /**
     * List of advertised routes to overlay: GET /routing/v1/overlay/route/advertised.
     *
     * @return ListResource<AdvtRouteRespItem>
     */
    public function getRoutingV1OverlayRouteAdvertised(): ListResource
    {
        return new ListResource($this->connector, AdvtRouteRespItem::class, fn (Query $query) => new GetRoutingV1OverlayRouteAdvertisedRequest($query));
    }

    /**
     * List of best learned routes from overlay: GET /routing/v1/overlay/route/learned/best.
     *
     * @return ListResource<BestRecvRouteRespItem>
     */
    public function getRoutingV1OverlayRouteLearnedBest(): ListResource
    {
        return new ListResource($this->connector, BestRecvRouteRespItem::class, fn (Query $query) => new GetRoutingV1OverlayRouteLearnedBestRequest($query));
    }

    /**
     * List of learned routes from overlay: GET /routing/v1/overlay/route/learned.
     *
     * @return ListResource<RecvRouteRespItem>
     */
    public function getRoutingV1OverlayRouteLearned(): ListResource
    {
        return new ListResource($this->connector, RecvRouteRespItem::class, fn (Query $query) => new GetRoutingV1OverlayRouteLearnedRequest($query));
    }

    /**
     * Reset overlay control connection: PUT /routing/v1/overlay/connection/reset.
     *
     * @param  array<string, mixed>  $options
     */
    public function putRoutingV1OverlayConnectionReset(string $device, array $options = []): mixed
    {
        return $this->fetch(new PutRoutingV1OverlayConnectionResetRequest($device, $options));
    }
}
