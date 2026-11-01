<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Radio;

use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get radio neighbor list: GET /ap_nbr_graph/v1/Radio/NeighborList/{radiomac}.
 *
 * Query parameters: tenant_id.
 */
class RadioNeighborsGetReqRequest extends ListRequest
{
    public string $resultKey = '';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $radiomac, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/ap_nbr_graph/v1/Radio/NeighborList/'.rawurlencode((string) $this->radiomac);
    }
}
