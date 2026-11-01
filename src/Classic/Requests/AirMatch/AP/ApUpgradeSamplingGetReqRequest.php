<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\AP;

use spkm\ArubaCentral\Classic\Data\AirMatch\Sampling;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get AP neighbor list: GET /ap_nbr_graph/v1/Ap/LiveUpgrade/Sampling.
 *
 * Query parameters (* required): tenant_id, aplist*.
 */
class ApUpgradeSamplingGetReqRequest extends ListRequest
{
    protected ?string $dto = Sampling::class;

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
        return '/ap_nbr_graph/v1/Ap/LiveUpgrade/Sampling';
    }
}
