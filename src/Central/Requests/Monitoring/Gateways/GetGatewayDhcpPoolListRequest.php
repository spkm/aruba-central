<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GatewayDhcpPoolItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get DHCP pools configured on the gateway: GET /network-monitoring/v1/gateways/{serial-number}/dhcp-pools.
 *
 * Query parameters: sort.
 */
class GetGatewayDhcpPoolListRequest extends ListRequest
{
    protected ?string $dto = GatewayDhcpPoolItem::class;

    public string $paging = self::CURSOR;

    public ?int $maxLimit = 100;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serialNumber, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/dhcp-pools';
    }
}
