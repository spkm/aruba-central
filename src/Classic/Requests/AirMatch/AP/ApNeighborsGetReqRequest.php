<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\AP;

use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get AP neighbor list: GET /ap_nbr_graph/v1/Ap/NeighborList/{apserialnum}.
 *
 * Query parameters: tenant_id, count, max_pathloss, ap_mac.
 */
class ApNeighborsGetReqRequest extends ListRequest
{
    public string $resultKey = '';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $apserialnum, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/ap_nbr_graph/v1/Ap/NeighborList/'.rawurlencode((string) $this->apserialnum);
    }
}
