<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\ApCoveragePlan;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all AP coverage plan from collection: GET /network-services/v1/airmatch-ap-coverage-plans.
 *
 * Query parameters: id.
 */
class ListAllApCoveragePlansRequest extends ListRequest
{
    protected ?string $dto = ApCoveragePlan::class;

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
        return '/network-services/v1/airmatch-ap-coverage-plans';
    }
}
