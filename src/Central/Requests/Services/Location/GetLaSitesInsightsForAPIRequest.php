<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Location;

use spkm\ArubaCentral\Central\Data\Services\LaSitesInsightsForAPI;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get the insights for each site of a tenant for a given time range.: GET /network-services/v1/location-analytics/sites/insights.
 *
 * Query parameters (* required): start-at*, end-at*, sort.
 */
class GetLaSitesInsightsForAPIRequest extends ListRequest
{
    protected ?string $dto = LaSitesInsightsForAPI::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/location-analytics/sites/insights';
    }
}
