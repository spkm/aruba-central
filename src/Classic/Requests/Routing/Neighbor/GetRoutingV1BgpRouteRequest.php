<?php

namespace spkm\ArubaCentral\Classic\Requests\Routing\Neighbor;

use spkm\ArubaCentral\Classic\Data\Routing\RouteRespItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List BGP routes: GET /routing/v1/bgp/route.
 *
 * Query parameters (* required): device*, marker.
 */
class GetRoutingV1BgpRouteRequest extends ListRequest
{
    protected ?string $dto = RouteRespItem::class;

    public string $resultKey = 'routes';

    public ?string $totalKey = null;

    public string $paging = self::CURSOR;

    public string $cursorParameter = 'marker';

    public string $cursorKey = 'marker';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/routing/v1/bgp/route';
    }
}
