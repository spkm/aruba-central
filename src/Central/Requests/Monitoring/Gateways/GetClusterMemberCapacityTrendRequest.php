<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\ClusterMemberCapacityTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get cluster member capacity trend: GET /network-monitoring/v1/clusters/{cluster-name}/capacity-trends/{serial-number}.
 *
 * Query options: filter.
 */
class GetClusterMemberCapacityTrendRequest extends ItemRequest
{
    protected ?string $dto = ClusterMemberCapacityTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $clusterName, protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/clusters/'.rawurlencode((string) $this->clusterName).'/capacity-trends/'.rawurlencode((string) $this->serialNumber);
    }
}
