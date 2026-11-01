<?php

namespace spkm\ArubaCentral\Classic\Requests\Rapids\Rogues;

use spkm\ArubaCentral\Classic\Data\Rapids\RogueAp;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Rogue APs: GET /rapids/v1/rogue_aps.
 *
 * Query parameters: group, label, site, start, end, swarm_id, from_timestamp, to_timestamp.
 */
class GetRapidsV1RogueApsRequest extends ListRequest
{
    protected ?string $dto = RogueAp::class;

    public string $resultKey = 'rogue_aps';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/rapids/v1/rogue_aps';
    }
}
