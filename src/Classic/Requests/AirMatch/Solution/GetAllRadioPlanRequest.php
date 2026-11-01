<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Solution;

use spkm\ArubaCentral\Classic\Data\AirMatch\RadioPlan;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all solutions for a customer: GET /solver/v1/radio_plan.
 *
 * Query parameters: tenant_id, band, debug.
 */
class GetAllRadioPlanRequest extends ListRequest
{
    protected ?string $dto = RadioPlan::class;

    public string $resultKey = '';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/solver/v1/radio_plan';
    }
}
