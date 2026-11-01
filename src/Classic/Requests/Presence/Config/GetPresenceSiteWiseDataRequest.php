<?php

namespace spkm\ArubaCentral\Classic\Requests\Presence\Config;

use spkm\ArubaCentral\Classic\Data\Presence\SiteanalyticsListData;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get presence aggregate values for list of sites.: GET /presence/v3/insights/sites/aggregates.
 *
 * Query parameters (* required): start_time*, end_time*, search, sort, site_id.
 */
class GetPresenceSiteWiseDataRequest extends ListRequest
{
    protected ?string $dto = SiteanalyticsListData::class;

    public string $resultKey = 'data';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/presence/v3/insights/sites/aggregates';
    }
}
