<?php

namespace spkm\ArubaCentral\Classic\Requests\NetworkHealth\NetworkHealth;

use spkm\ArubaCentral\Classic\Data\NetworkHealth\Site;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get data for all sites: GET /branchhealth/v1/site.
 *
 * Query parameters: name, column, order, Site properties used with thresholds.
 */
class GetSitesApiRequest extends ListRequest
{
    protected ?string $dto = Site::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/branchhealth/v1/site';
    }
}
