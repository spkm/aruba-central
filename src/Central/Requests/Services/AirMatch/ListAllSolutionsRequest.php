<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\Solution;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get solver optimizations for a given tenant: GET /network-services/v1/airmatch-solutions.
 *
 * Query parameters: count, start-at, end-at, runmode, rf-domain-id, rf-partition-id, band-selected, id, status.
 */
class ListAllSolutionsRequest extends ListRequest
{
    protected ?string $dto = Solution::class;

    public ?int $maxLimit = 500;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-solutions';
    }
}
