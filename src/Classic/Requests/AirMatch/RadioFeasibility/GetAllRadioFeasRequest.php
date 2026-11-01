<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\RadioFeasibility;

use spkm\ArubaCentral\Classic\Data\AirMatch\RadioFeas;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all radio feasibility for a customer: GET /feasibility/v1/radio_feasibility.
 *
 * Query parameters: tenant_id.
 */
class GetAllRadioFeasRequest extends ListRequest
{
    protected ?string $dto = RadioFeas::class;

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
        return '/feasibility/v1/radio_feasibility';
    }
}
