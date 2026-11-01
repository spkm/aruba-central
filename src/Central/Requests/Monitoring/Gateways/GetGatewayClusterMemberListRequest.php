<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\ClusterMemberItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Gateway Cluster members: GET /network-monitoring/v1/clusters/{cluster-name}/members.
 *
 * Query parameters: filter, sort.
 */
class GetGatewayClusterMemberListRequest extends ListRequest
{
    protected ?string $dto = ClusterMemberItem::class;

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
        return '/network-monitoring/v1/clusters/'.rawurlencode((string) $this->clusterName).'/members';
    }
}
