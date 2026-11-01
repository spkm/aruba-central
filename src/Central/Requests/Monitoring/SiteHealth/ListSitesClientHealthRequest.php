<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\SiteHealth;

use spkm\ArubaCentral\Central\Data\Monitoring\SiteClientHealthItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List of sites with client health: GET /network-monitoring/v1/sites-client-health.
 *
 * Query parameters: filter, sort.
 */
class ListSitesClientHealthRequest extends ListRequest
{
    protected ?string $dto = SiteClientHealthItem::class;

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
        return '/network-monitoring/v1/sites-client-health';
    }
}
