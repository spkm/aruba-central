<?php

namespace spkm\ArubaCentral\Classic\Requests\Routing\Route;

use spkm\ArubaCentral\Classic\Data\Routing\RouteRespItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get routes: GET /routing/v1/route.
 *
 * Query parameters (* required): device*, api, marker.
 */
class GetRoutingV1RouteRequest extends ListRequest
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
        return '/routing/v1/route';
    }
}
