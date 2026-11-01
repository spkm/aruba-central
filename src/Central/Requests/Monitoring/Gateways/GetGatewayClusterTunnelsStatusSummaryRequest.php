<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\ClusterTunnelStatusSummary;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get summary of cluster tunnel status: GET /network-monitoring/v1/clusters/{cluster-name}/tunnels-status-summary.
 */
class GetGatewayClusterTunnelsStatusSummaryRequest extends ItemRequest
{
    protected ?string $dto = ClusterTunnelStatusSummary::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $clusterName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/clusters/'.rawurlencode((string) $this->clusterName).'/tunnels-status-summary';
    }
}
