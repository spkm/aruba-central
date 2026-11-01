<?php

namespace spkm\ArubaCentral\Classic\Requests\Routing\Neighbor;

use spkm\ArubaCentral\Classic\Data\Routing\NbrRouteLearnRespItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List of routes learned form a BGP neighbor: GET /routing/v1/bgp/neighbor/route/learned.
 *
 * Query parameters (* required): device*, address*, marker.
 */
class GetRoutingV1BgpNeighborRouteLearnedRequest extends ListRequest
{
    protected ?string $dto = NbrRouteLearnRespItem::class;

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
        return '/routing/v1/bgp/neighbor/route/learned';
    }
}
