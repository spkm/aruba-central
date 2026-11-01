<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\VPN;

use spkm\ArubaCentral\Classic\Data\Monitoring\VpnTunnel;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Vpn Details: GET /monitoring/v1/vpn/info.
 *
 * Query parameters (* required): swarm_id*.
 */
class GetVpnInfoRequest extends ListRequest
{
    protected ?string $dto = VpnTunnel::class;

    public string $resultKey = 'tunnels';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/vpn/info';
    }
}
