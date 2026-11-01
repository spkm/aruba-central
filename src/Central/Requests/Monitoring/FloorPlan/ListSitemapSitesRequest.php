<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan;

use spkm\ArubaCentral\Central\Data\Monitoring\SiteInfo;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Retrieve sites with or without floor configuration: GET /network-monitoring/v1/sitemaps/sites.
 *
 * Query parameters: filter.
 */
class ListSitemapSitesRequest extends ListRequest
{
    protected ?string $dto = SiteInfo::class;

    public ?int $maxLimit = 10000;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/sitemaps/sites';
    }
}
