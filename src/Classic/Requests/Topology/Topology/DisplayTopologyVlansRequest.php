<?php

namespace spkm\ArubaCentral\Classic\Requests\Topology\Topology;

use spkm\ArubaCentral\Classic\Data\Topology\VlanObjectSchema;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get vlan list of a site.: GET /topology_external_api/vlans/{site_id}.
 *
 * Query parameters: search.
 */
class DisplayTopologyVlansRequest extends ListRequest
{
    protected ?string $dto = VlanObjectSchema::class;

    public string $resultKey = 'vlans';

    public ?string $totalKey = null;

    public array $defaults = ['limit' => 20, 'offset' => 0];

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected int $siteId, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/topology_external_api/vlans/'.rawurlencode((string) $this->siteId);
    }
}
