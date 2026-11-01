<?php

namespace spkm\ArubaCentral\Central\Requests\Services\GDPR;

use spkm\ArubaCentral\Central\Data\Services\ExclusionType;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get available exclusion types: GET /network-services/v1/gdpr-exclusion-types.
 */
class ListExclusionTypesRequest extends ListRequest
{
    protected ?string $dto = ExclusionType::class;

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
        return '/network-services/v1/gdpr-exclusion-types';
    }
}
