<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\AP;

use spkm\ArubaCentral\Classic\Data\Monitoring\APBssid;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List BSSIDs: GET /monitoring/v2/bssids.
 *
 * Query parameters: group, swarm_id, label, site, serial, macaddr, cluster_id, calculate_total, sort.
 */
class GetBssidsRequest extends ListRequest
{
    protected ?string $dto = APBssid::class;

    public string $resultKey = 'aps';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v2/bssids';
    }
}
