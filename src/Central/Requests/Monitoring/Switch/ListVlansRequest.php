<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get a list of Switch VLANs: GET /network-monitoring/v1/switches/{serial-number}/vlans.
 *
 * Query parameters: filter, search, sort.
 */
class ListVlansRequest extends ListRequest
{
    public ?int $maxLimit = 1000;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serialNumber, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/switches/'.rawurlencode((string) $this->serialNumber).'/vlans';
    }
}
