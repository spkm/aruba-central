<?php

namespace spkm\ArubaCentral\Classic\Requests\Rapids\Rogues;

use spkm\ArubaCentral\Classic\Data\Rapids\SuspectAp;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List suspect APs: GET /rapids/v1/suspect_aps.
 *
 * Query parameters: group, label, site, start, end, swarm_id, from_timestamp, to_timestamp.
 */
class GetRapidsV1SuspectApsRequest extends ListRequest
{
    protected ?string $dto = SuspectAp::class;

    public string $resultKey = 'suspect_aps';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/rapids/v1/suspect_aps';
    }
}
