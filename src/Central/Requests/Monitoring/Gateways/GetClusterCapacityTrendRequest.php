<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\ClusterCapacityTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get cluster capacity trend: GET /network-monitoring/v1/clusters/{cluster-name}/capacity-trends.
 *
 * Query options: filter.
 */
class GetClusterCapacityTrendRequest extends ItemRequest
{
    protected ?string $dto = ClusterCapacityTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $clusterName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/clusters/'.rawurlencode((string) $this->clusterName).'/capacity-trends';
    }
}
