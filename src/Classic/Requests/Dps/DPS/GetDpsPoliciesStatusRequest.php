<?php

namespace spkm\ArubaCentral\Classic\Requests\Dps\DPS;

use spkm\ArubaCentral\Classic\Data\Dps\DpsPoliciesStatusInternalData;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * DPS Compliance Status of all DPS Policies for a given BOC.: GET /datapoints/v1/cluster/{cluster_id}/sdwan_policies/status.
 */
class GetDpsPoliciesStatusRequest extends ListRequest
{
    protected ?string $dto = DpsPoliciesStatusInternalData::class;

    public string $resultKey = 'dps_policies_status_data';

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
        return '/datapoints/v1/cluster/'.rawurlencode((string) $this->clusterId).'/sdwan_policies/status';
    }
}
