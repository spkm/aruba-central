<?php

namespace spkm\ArubaCentral\Classic\Requests\Rapids\Rogues;

use spkm\ArubaCentral\Classic\Data\Rapids\ManuallyContainedAp;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List manually contained APs: GET /rapids/v1/manually_contained_aps.
 *
 * Query parameters: group, label, site, start, end, swarm_id, from_timestamp, to_timestamp.
 */
class GetRapidsV1ManuallyContainedApsRequest extends ListRequest
{
    protected ?string $dto = ManuallyContainedAp::class;

    public string $resultKey = 'manually_contained_aps';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/rapids/v1/manually_contained_aps';
    }
}
