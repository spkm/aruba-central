<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\ClusterVlanMismatch;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Gateway cluster VLAN mismatch summary: GET /network-monitoring/v1/clusters/{cluster-name}/vlan-mismatch.
 *
 * Query options: filter.
 */
class GetGatewayClusterVlanMismatchSummaryRequest extends ItemRequest
{
    protected ?string $dto = ClusterVlanMismatch::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $clusterName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/clusters/'.rawurlencode((string) $this->clusterName).'/vlan-mismatch';
    }
}
