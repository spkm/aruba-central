<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\ClusterTunnelHealthSummary;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get summary of cluster tunnel health: GET /network-monitoring/v1/clusters/{cluster-name}/tunnels-health-summary.
 */
class GetGatewayClusterTunnelHealthRequest extends ItemRequest
{
    protected ?string $dto = ClusterTunnelHealthSummary::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $clusterName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/clusters/'.rawurlencode((string) $this->clusterName).'/tunnels-health-summary';
    }
}
