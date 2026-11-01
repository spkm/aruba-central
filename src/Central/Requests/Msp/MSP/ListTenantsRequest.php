<?php

namespace spkm\ArubaCentral\Central\Requests\Msp\MSP;

use spkm\ArubaCentral\Central\Data\Msp\MSPTenantmsp;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all MSP tenants information.: GET /network-msp/v2/list-tenants.
 *
 * Query parameters: filter, sort.
 */
class ListTenantsRequest extends ListRequest
{
    protected ?string $dto = MSPTenantmsp::class;

    public string $paging = self::CURSOR;

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
        return '/network-msp/v2/list-tenants';
    }
}
