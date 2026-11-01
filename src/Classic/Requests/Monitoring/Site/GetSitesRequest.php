<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Site;

use spkm\ArubaCentral\Classic\Data\Monitoring\Site;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Sites: GET /central/v2/sites.
 *
 * Query parameters: calculate_total, sort.
 */
class GetSitesRequest extends ListRequest
{
    protected ?string $dto = Site::class;

    public string $resultKey = 'sites';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/central/v2/sites';
    }
}
