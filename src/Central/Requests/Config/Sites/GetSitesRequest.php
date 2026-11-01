<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Sites;

use spkm\ArubaCentral\Central\Data\Config\Site;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get sites: GET /network-config/v1/sites.
 *
 * Query parameters: filter, sort.
 */
class GetSitesRequest extends ListRequest
{
    protected ?string $dto = Site::class;

    public ?int $maxLimit = 100;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1/sites';
    }
}
