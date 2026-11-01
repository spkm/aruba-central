<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GatewayClusterTunnelItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Gateway Cluster tunnels: GET /network-monitoring/v1/clusters/{cluster-name}/tunnels.
 *
 * Query parameters: filter, sort.
 */
class GetGatewayClusterTunnelListRequest extends ListRequest
{
    protected ?string $dto = GatewayClusterTunnelItem::class;

    public string $paging = self::CURSOR;

    public ?int $maxLimit = 100;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $clusterName, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/clusters/'.rawurlencode((string) $this->clusterName).'/tunnels';
    }
}
