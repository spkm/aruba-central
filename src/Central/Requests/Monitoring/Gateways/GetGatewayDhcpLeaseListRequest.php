<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GatewayDhcpLeaseItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get DHCP leases present in the DHCP pool: GET /network-monitoring/v1/gateways/{serial-number}/dhcp-clients.
 *
 * Query parameters: filter, sort.
 */
class GetGatewayDhcpLeaseListRequest extends ListRequest
{
    protected ?string $dto = GatewayDhcpLeaseItem::class;

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
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/dhcp-clients';
    }
}
