<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\RadioFeasibility;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all radio feasibility for a tenant: GET /network-services/v1/airmatch-radio-feasibility.
 */
class ListRadioFeasibilityRequest extends ListRequest
{
    protected ?string $dto = RadioFeasibility::class;

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
        return '/network-services/v1/airmatch-radio-feasibility';
    }
}
