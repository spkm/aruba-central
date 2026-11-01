<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\IDPS;

use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get a list of IDPS threats.: GET /network-monitoring/v1/threats.
 *
 * Query parameters (* required): start-at*, end-at, filter, sort.
 */
class GetThreatsRequest extends ListRequest
{
    public ?int $maxLimit = 1000;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/threats';
    }
}
