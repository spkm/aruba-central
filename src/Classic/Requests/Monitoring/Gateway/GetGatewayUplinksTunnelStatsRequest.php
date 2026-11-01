<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway;

use spkm\ArubaCentral\Classic\Data\Monitoring\Bandwidth;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Gateway Uplink tunnel stats: GET /monitoring/v1/gateways/{serial}/tunnels/stats.
 *
 * Query parameters: uplink_id, map_name, interval, from_timestamp, to_timestamp.
 */
class GetGatewayUplinksTunnelStatsRequest extends ListRequest
{
    protected ?string $dto = Bandwidth::class;

    public string $resultKey = 'samples';

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
        return '/monitoring/v1/gateways/'.rawurlencode((string) $this->serial).'/tunnels/stats';
    }
}
