<?php

namespace spkm\ArubaCentral\Classic\Requests\Rapids\Rogues;

use spkm\ArubaCentral\Classic\Data\Rapids\NeighborAp;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List neighbor APs: GET /rapids/v1/neighbor_aps.
 *
 * Query parameters: group, label, site, start, end, swarm_id, from_timestamp, to_timestamp.
 */
class GetRapidsV1NeighborApsRequest extends ListRequest
{
    protected ?string $dto = NeighborAp::class;

    public string $resultKey = 'neighbor_aps';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/rapids/v1/neighbor_aps';
    }
}
