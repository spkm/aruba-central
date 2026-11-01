<?php

namespace spkm\ArubaCentral\Classic\Requests\Guest\Portals;

use spkm\ArubaCentral\Classic\Data\Guest\PortalLimitedData;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all portals with limited data: GET /guest/v1/portals.
 *
 * Query parameters: sort.
 */
class GetApiPortalsRequest extends ListRequest
{
    protected ?string $dto = PortalLimitedData::class;

    public string $resultKey = 'portals';

    public ?string $totalKey = null;

    public array $defaults = ['limit' => 10, 'offset' => 0];

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/guest/v1/portals';
    }
}
