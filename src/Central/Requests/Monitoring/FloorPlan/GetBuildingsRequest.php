<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan;

use spkm\ArubaCentral\Central\Data\Monitoring\BuildingWithFloorsItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Retrieve building information: GET /network-monitoring/v1/sitemaps/{site-id}/buildings.
 */
class GetBuildingsRequest extends ListRequest
{
    protected ?string $dto = BuildingWithFloorsItem::class;

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $siteId, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/sitemaps/'.rawurlencode((string) $this->siteId).'/buildings';
    }
}
