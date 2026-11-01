<?php

namespace spkm\ArubaCentral\Classic\Requests\Dps\DPS;

use spkm\ArubaCentral\Classic\Data\Dps\DpsPolicyStatsHigherWindowInternalData;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Gets DPS Policy stats for a given BOC.: GET /datapoints/v1/cluster/{cluster_id}/sdwan_policy/policy_stats_higher_window/{policy_name}.
 *
 * Query parameters: from_timestamp, to_timestamp.
 */
class GetDpsPolicyStatsHigherWindowRequest extends ListRequest
{
    protected ?string $dto = DpsPolicyStatsHigherWindowInternalData::class;

    public string $resultKey = 'dps_policy_stats_higher_window_data';

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
        return '/datapoints/v1/cluster/'.rawurlencode((string) $this->clusterId).'/sdwan_policy/policy_stats_higher_window/'.rawurlencode((string) $this->policyName);
    }
}
