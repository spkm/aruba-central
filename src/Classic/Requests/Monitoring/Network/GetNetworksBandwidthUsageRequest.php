<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Network;

use spkm\ArubaCentral\Classic\Data\Monitoring\Bandwidth;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * WLAN Network Bandwidth usage: GET /monitoring/v2/networks/bandwidth_usage.
 *
 * Query parameters (* required): network*, group, swarm_id, label, from_timestamp, to_timestamp, site.
 */
class GetNetworksBandwidthUsageRequest extends ListRequest
{
    protected ?string $dto = Bandwidth::class;

    public string $resultKey = 'samples';

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
        return '/monitoring/v2/networks/bandwidth_usage';
    }
}
