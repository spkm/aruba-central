<?php

namespace spkm\ArubaCentral\Classic\Requests\Routing\Area;

use spkm\ArubaCentral\Classic\Data\Routing\AreaRespItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List OSPF Area Information: GET /routing/v1/ospf/area.
 *
 * Query parameters (* required): device*, marker.
 */
class GetRoutingV1OspfAreaRequest extends ListRequest
{
    protected ?string $dto = AreaRespItem::class;

    public string $resultKey = 'areas';

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
        return '/routing/v1/ospf/area';
    }
}
