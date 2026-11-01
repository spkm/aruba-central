<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\SiteHealth;

use spkm\ArubaCentral\Central\Data\Monitoring\SiteHealthItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List of sites with health overview: GET /network-monitoring/v1/sites-health.
 *
 * Query parameters: filter, sort.
 */
class ListSitesHealthRequest extends ListRequest
{
    protected ?string $dto = SiteHealthItem::class;

    public ?int $maxLimit = 1000;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/sites-health';
    }
}
