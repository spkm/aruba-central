<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Swarm;

use spkm\ArubaCentral\Classic\Data\Monitoring\Swarm;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Swarms: GET /monitoring/v1/swarms.
 *
 * Query parameters: group, status, public_ip_address, fields, calculate_total, sort, swarm_name.
 */
class GetSwarmsRequest extends ListRequest
{
    protected ?string $dto = Swarm::class;

    public string $resultKey = 'swarms';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/swarms';
    }
}
