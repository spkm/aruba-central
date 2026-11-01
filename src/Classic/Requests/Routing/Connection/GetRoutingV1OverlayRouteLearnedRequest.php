<?php

namespace spkm\ArubaCentral\Classic\Requests\Routing\Connection;

use spkm\ArubaCentral\Classic\Data\Routing\RecvRouteRespItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List of learned routes from overlay: GET /routing/v1/overlay/route/learned.
 *
 * Query parameters (* required): device*, marker.
 */
class GetRoutingV1OverlayRouteLearnedRequest extends ListRequest
{
    protected ?string $dto = RecvRouteRespItem::class;

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
        return '/routing/v1/overlay/route/learned';
    }
}
