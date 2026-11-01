<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\ClusterConnectivityGraph;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Gateway cluster connectivity graph information: GET /network-monitoring/v1/clusters/{cluster-name}/connectivity-graph.
 */
class GetGatewayClusterConnectivityGraphRequest extends ItemRequest
{
    protected ?string $dto = ClusterConnectivityGraph::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $clusterName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/clusters/'.rawurlencode((string) $this->clusterName).'/connectivity-graph';
    }
}
