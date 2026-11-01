<?php

namespace spkm\ArubaCentral\Central\Requests\Services\GDPR;

use spkm\ArubaCentral\Central\Data\Services\Exclusion;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List all exclusion records: GET /network-services/v1/gdpr-exclusions.
 *
 * Query parameters: filter, sort.
 */
class ListExclusionsRequest extends ListRequest
{
    protected ?string $dto = Exclusion::class;

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
        return '/network-services/v1/gdpr-exclusions';
    }
}
