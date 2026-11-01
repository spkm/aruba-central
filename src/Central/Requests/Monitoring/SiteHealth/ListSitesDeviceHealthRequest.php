<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\SiteHealth;

use spkm\ArubaCentral\Central\Data\Monitoring\SiteDeviceHealthItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List of sites with device health: GET /network-monitoring/v1/sites-device-health.
 *
 * Query parameters: filter, sort.
 */
class ListSitesDeviceHealthRequest extends ListRequest
{
    protected ?string $dto = SiteDeviceHealthItem::class;

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
        return '/network-monitoring/v1/sites-device-health';
    }
}
