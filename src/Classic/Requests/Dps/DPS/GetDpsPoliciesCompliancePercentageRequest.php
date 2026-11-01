<?php

namespace spkm\ArubaCentral\Classic\Requests\Dps\DPS;

use spkm\ArubaCentral\Classic\Data\Dps\DpsPolicyCompliancePercentageInternalData;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * DPS Compliance percentage of all DPS Policies for a given BOC.: GET /datapoints/v1/cluster/{cluster_id}/sdwan_policies/compliance_percentage.
 *
 * Query parameters: from_timestamp, to_timestamp.
 */
class GetDpsPoliciesCompliancePercentageRequest extends ListRequest
{
    protected ?string $dto = DpsPolicyCompliancePercentageInternalData::class;

    public string $resultKey = 'dps_policies_compliance_percentage_data';

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
        return '/datapoints/v1/cluster/'.rawurlencode((string) $this->clusterId).'/sdwan_policies/compliance_percentage';
    }
}
