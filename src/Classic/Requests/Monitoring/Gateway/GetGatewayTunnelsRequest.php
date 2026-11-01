<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway;

use spkm\ArubaCentral\Classic\Data\Monitoring\TunnelDetail;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Gateway Tunnels Details: GET /monitoring/v1/gateways/{serial}/tunnels.
 *
 * Query parameters: timerange.
 */
class GetGatewayTunnelsRequest extends ListRequest
{
    protected ?string $dto = TunnelDetail::class;

    public string $resultKey = 'tunnels';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serial, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/gateways/'.rawurlencode((string) $this->serial).'/tunnels';
    }
}
