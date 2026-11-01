<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\ApInfo;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get AP information for all APs of a tenant: GET /network-services/v1/airmatch-aps.
 */
class ListApInfoRequest extends ListRequest
{
    protected ?string $dto = ApInfo::class;

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
        return '/network-services/v1/airmatch-aps';
    }
}
