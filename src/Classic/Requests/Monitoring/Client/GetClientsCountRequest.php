<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Client;

use spkm\ArubaCentral\Classic\Data\Monitoring\ClientCount;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Total Clients Count: GET /monitoring/v1/clients/count.
 *
 * Query parameters: group, swarm_id, label, network, cluster_id, stack_id, device_type, serial, band, radio_number, from_timestamp, to_timestamp.
 */
class GetClientsCountRequest extends ListRequest
{
    protected ?string $dto = ClientCount::class;

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
        return '/monitoring/v1/clients/count';
    }
}
