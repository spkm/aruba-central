<?php

namespace spkm\ArubaCentral\Classic\Requests\Dps\DPS;

use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Gets DPS Policy Event Logs for a given BOC.: GET /datapoints/v1/cluster/{cluster_id}/sdwan_policy/event_logs/{policy_name}.
 */
class GetDpsPoliciesEventLogsRequest extends ListRequest
{
    public string $resultKey = 'dps_policy_event_logs_data';

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
        return '/datapoints/v1/cluster/'.rawurlencode((string) $this->clusterId).'/sdwan_policy/event_logs/'.rawurlencode((string) $this->policyName);
    }
}
