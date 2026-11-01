<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway;

use spkm\ArubaCentral\Classic\Data\Monitoring\DHCPPoolInfo;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Gateway DHCP Pools details: GET /monitoring/v1/gateways/{serial}/dhcp_pools.
 */
class GetGatewayDhcpPoolsRequest extends ListRequest
{
    protected ?string $dto = DHCPPoolInfo::class;

    public string $resultKey = 'result';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serial, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/gateways/'.rawurlencode((string) $this->serial).'/dhcp_pools';
    }
}
