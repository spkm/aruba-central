<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan;

use spkm\ArubaCentral\Central\Data\Monitoring\WallsItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Retrieve Walls: GET /network-monitoring/v1/sitemaps/{site-id}/floors/{floor-id}/walls.
 */
class GetWallsRequest extends ListRequest
{
    protected ?string $dto = WallsItem::class;

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $siteId, protected string $floorId, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/sitemaps/'.rawurlencode((string) $this->siteId).'/floors/'.rawurlencode((string) $this->floorId).'/walls';
    }
}
