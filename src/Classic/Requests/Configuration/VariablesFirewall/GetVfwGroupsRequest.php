<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\VariablesFirewall;

use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get whitelisted groups in Variables Firewall.: GET /configuration/v1/variables_firewall/groups.
 */
class GetVfwGroupsRequest extends ListRequest
{
    public string $resultKey = 'groups';

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
        return '/configuration/v1/variables_firewall/groups';
    }
}
