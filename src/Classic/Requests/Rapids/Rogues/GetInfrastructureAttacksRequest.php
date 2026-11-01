<?php

namespace spkm\ArubaCentral\Classic\Requests\Rapids\Rogues;

use spkm\ArubaCentral\Classic\Data\Rapids\InfrastructureAttack;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Infrastructure Attacks: GET /rapids/v1/wids/infrastructure_attacks.
 *
 * Query parameters: group, label, site, start, end, calculate_total, sort, swarm_id, from_timestamp, to_timestamp.
 */
class GetInfrastructureAttacksRequest extends ListRequest
{
    protected ?string $dto = InfrastructureAttack::class;

    public string $resultKey = 'infrastructure_attacks';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/rapids/v1/wids/infrastructure_attacks';
    }
}
