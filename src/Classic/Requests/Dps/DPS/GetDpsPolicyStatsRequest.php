<?php

namespace spkm\ArubaCentral\Classic\Requests\Dps\DPS;

use spkm\ArubaCentral\Classic\Data\Dps\DpsPolicyStatsInternalData;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Gets DPS Policy stats for a given BOC.: GET /datapoints/v1/cluster/{cluster_id}/sdwan_policy/policy_stats/{policy_name}.
 */
class GetDpsPolicyStatsRequest extends ListRequest
{
    protected ?string $dto = DpsPolicyStatsInternalData::class;

    public string $resultKey = 'dps_policy_stats_data';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $clusterId, protected string $policyName, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/datapoints/v1/cluster/'.rawurlencode((string) $this->clusterId).'/sdwan_policy/policy_stats/'.rawurlencode((string) $this->policyName);
    }
}
