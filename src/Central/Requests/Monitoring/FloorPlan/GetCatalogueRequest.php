<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan;

use spkm\ArubaCentral\Central\Data\Monitoring\CatalogueApsItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Retrieves device specification for all models: GET /network-monitoring/v1/catalogue-aps.
 */
class GetCatalogueRequest extends ListRequest
{
    protected ?string $dto = CatalogueApsItem::class;

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/catalogue-aps';
    }
}
