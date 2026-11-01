<?php

namespace spkm\ArubaCentral\Classic\Requests\Rapids\Rogues;

use spkm\ArubaCentral\Classic\Data\Rapids\ClientAttack;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Client Attacks: GET /rapids/v1/wids/client_attacks.
 *
 * Query parameters: group, label, site, start, end, calculate_total, sort, swarm_id, from_timestamp, to_timestamp.
 */
class GetClientAttacksRequest extends ListRequest
{
    protected ?string $dto = ClientAttack::class;

    public string $resultKey = 'client_attacks';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/rapids/v1/wids/client_attacks';
    }
}
