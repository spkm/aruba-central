<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Network;

use spkm\ArubaCentral\Classic\Data\Monitoring\NetworkRecord;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List all Networks: GET /monitoring/v2/networks.
 *
 * Query parameters: group, swarm_id, label, site, calculate_client_count, sort.
 */
class GetNetworksRequest extends ListRequest
{
    protected ?string $dto = NetworkRecord::class;

    public string $resultKey = 'networks';

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
        return '/monitoring/v2/networks';
    }
}
