<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\RFDomain;

use spkm\ArubaCentral\Classic\Data\AirMatch\RfDomain;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get partition information: GET /ap_nbr_graph/v1/partition.
 *
 * Query parameters: tenant_id, band, ptype.
 */
class PartitionGetReqRequest extends ListRequest
{
    protected ?string $dto = RfDomain::class;

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
        return '/ap_nbr_graph/v1/partition';
    }
}
