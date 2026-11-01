<?php

namespace spkm\ArubaCentral\Classic\Resources\Dps;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Dps\DpsKPIInternalData;
use spkm\ArubaCentral\Classic\Data\Dps\DpsPoliciesStatusInternalData;
use spkm\ArubaCentral\Classic\Data\Dps\DpsPolicyCompliancePercentageInternalData;
use spkm\ArubaCentral\Classic\Data\Dps\DpsPolicyStatsHigherWindowInternalData;
use spkm\ArubaCentral\Classic\Data\Dps\DpsPolicyStatsInternalData;
use spkm\ArubaCentral\Classic\Data\Dps\DpsSitePolicyStatsInternalData;
use spkm\ArubaCentral\Classic\Requests\Dps\DPS\GetDpsPoliciesCompliancePercentageRequest;
use spkm\ArubaCentral\Classic\Requests\Dps\DPS\GetDpsPoliciesEventLogsRequest;
use spkm\ArubaCentral\Classic\Requests\Dps\DPS\GetDpsPoliciesKpiStatsRequest;
use spkm\ArubaCentral\Classic\Requests\Dps\DPS\GetDpsPoliciesStatusRequest;
use spkm\ArubaCentral\Classic\Requests\Dps\DPS\GetDpsPolicyStatsHigherWindowRequest;
use spkm\ArubaCentral\Classic\Requests\Dps\DPS\GetDpsPolicyStatsRequest;
use spkm\ArubaCentral\Classic\Requests\Dps\DPS\GetDpsSitePolicyStatsRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The DPS API, from Aruba::dps().
 *
 * @extends BaseResource<Data>
 */
class DpsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Gets DPS Policy stats for a given BOC.: GET /datapoints/v1/cluster/{cluster_id}/sdwan_policy/policy_stats/{policy_name}.
     *
     * @return ListResource<DpsPolicyStatsInternalData>
     */
    public function getDpsPolicyStats(string $clusterId, string $policyName): ListResource
    {
        return new ListResource($this->connector, DpsPolicyStatsInternalData::class, fn (Query $query) => new GetDpsPolicyStatsRequest($clusterId, $policyName, $query));
    }

    /**
     * DPS Compliance percentage of all DPS Policies for a given BOC.: GET /datapoints/v1/cluster/{cluster_id}/sdwan_policies/compliance_percentage.
     *
     * @return ListResource<DpsPolicyCompliancePercentageInternalData>
     */
    public function getDpsPoliciesCompliancePercentage(string $clusterId): ListResource
    {
        return new ListResource($this->connector, DpsPolicyCompliancePercentageInternalData::class, fn (Query $query) => new GetDpsPoliciesCompliancePercentageRequest($clusterId, $query));
    }

    /**
     * Gets DPS Policy Event Logs for a given BOC.: GET /datapoints/v1/cluster/{cluster_id}/sdwan_policy/event_logs/{policy_name}.
     *
     * @return ListResource<Data>
     */
    public function getDpsPoliciesEventLogs(string $clusterId, string $policyName): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new GetDpsPoliciesEventLogsRequest($clusterId, $policyName, $query));
    }

    /**
     * DPS Key Performance Indicator for a given BOC.: GET /datapoints/v1/cluster/{cluster_id}/sdwan_policies/kpi.
     *
     * @return ListResource<DpsKPIInternalData>
     */
    public function getDpsPoliciesKpiStats(string $clusterId): ListResource
    {
        return new ListResource($this->connector, DpsKPIInternalData::class, fn (Query $query) => new GetDpsPoliciesKpiStatsRequest($clusterId, $query));
    }

    /**
     * DPS Compliance Status of all DPS Policies for a given BOC.: GET /datapoints/v1/cluster/{cluster_id}/sdwan_policies/status.
     *
     * @return ListResource<DpsPoliciesStatusInternalData>
     */
    public function getDpsPoliciesStatus(string $clusterId): ListResource
    {
        return new ListResource($this->connector, DpsPoliciesStatusInternalData::class, fn (Query $query) => new GetDpsPoliciesStatusRequest($clusterId, $query));
    }

    /**
     * Gets DPS Policy stats for a given BOC.: GET /datapoints/v1/cluster/{cluster_id}/sdwan_policy/policy_stats_higher_window/{policy_name}.
     *
     * @return ListResource<DpsPolicyStatsHigherWindowInternalData>
     */
    public function getDpsPolicyStatsHigherWindow(string $clusterId, string $policyName): ListResource
    {
        return new ListResource($this->connector, DpsPolicyStatsHigherWindowInternalData::class, fn (Query $query) => new GetDpsPolicyStatsHigherWindowRequest($clusterId, $policyName, $query));
    }

    /**
     * Gets DPS Compliance stats for a given Site.: GET /datapoints/v1/sdwan_site/site_policy_stats/{site_name}.
     *
     * @return ListResource<DpsSitePolicyStatsInternalData>
     */
    public function getDpsSitePolicyStats(string $siteName): ListResource
    {
        return new ListResource($this->connector, DpsSitePolicyStatsInternalData::class, fn (Query $query) => new GetDpsSitePolicyStatsRequest($siteName, $query));
    }
}
