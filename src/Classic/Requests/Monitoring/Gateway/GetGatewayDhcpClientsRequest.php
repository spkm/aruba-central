<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway;

use spkm\ArubaCentral\Classic\Data\Monitoring\DHCPClientInfo;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Gateway DHCP Clients information: GET /monitoring/v1/gateways/{serial}/dhcp_clients.
 *
 * Query parameters: reservation.
 */
class GetGatewayDhcpClientsRequest extends ListRequest
{
    protected ?string $dto = DHCPClientInfo::class;

    public string $resultKey = 'clients';

    public ?string $totalKey = null;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serial, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/gateways/'.rawurlencode((string) $this->serial).'/dhcp_clients';
    }
}
