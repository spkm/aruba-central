<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Groups;

use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all groups.: GET /configuration/v2/groups.
 */
class GetGroupsRequest extends ListRequest
{
    public string $resultKey = 'data';

    public ?int $maxLimit = 100;

    public array $defaults = ['limit' => 20, 'offset' => 0];

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v2/groups';
    }
}
