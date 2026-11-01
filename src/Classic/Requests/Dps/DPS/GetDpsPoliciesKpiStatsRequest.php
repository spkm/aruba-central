<?php

namespace spkm\ArubaCentral\Classic\Requests\Dps\DPS;

use spkm\ArubaCentral\Classic\Data\Dps\DpsKPIInternalData;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * DPS Key Performance Indicator for a given BOC.: GET /datapoints/v1/cluster/{cluster_id}/sdwan_policies/kpi.
 */
class GetDpsPoliciesKpiStatsRequest extends ListRequest
{
    protected ?string $dto = DpsKPIInternalData::class;

    public string $resultKey = 'dps_kpi_data';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $clusterId, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/datapoints/v1/cluster/'.rawurlencode((string) $this->clusterId).'/sdwan_policies/kpi';
    }
}
