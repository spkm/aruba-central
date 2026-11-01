<?php

namespace spkm\ArubaCentral\Classic\Requests\Routing\Neighbor;

use spkm\ArubaCentral\Classic\Data\Routing\NeighborRespItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List RIP neighbors: GET /routing/v1/rip/neighbor.
 *
 * Query parameters (* required): device*, marker.
 */
class GetRoutingV1RipNeighborRequest extends ListRequest
{
    protected ?string $dto = NeighborRespItem::class;

    public string $resultKey = 'neighbors';

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
        return '/routing/v1/rip/neighbor';
    }
}
