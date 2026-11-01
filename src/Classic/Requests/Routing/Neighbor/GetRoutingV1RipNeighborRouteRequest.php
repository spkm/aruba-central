<?php

namespace spkm\ArubaCentral\Classic\Requests\Routing\Neighbor;

use spkm\ArubaCentral\Classic\Data\Routing\NbrRouteRespItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List of routes learned from a RIP neighbor: GET /routing/v1/rip/neighbor/route.
 *
 * Query parameters (* required): device*, address*, marker.
 */
class GetRoutingV1RipNeighborRouteRequest extends ListRequest
{
    protected ?string $dto = NbrRouteRespItem::class;

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
        return '/routing/v1/rip/neighbor/route';
    }
}
