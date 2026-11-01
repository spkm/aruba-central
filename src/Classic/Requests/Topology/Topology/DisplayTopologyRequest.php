<?php

namespace spkm\ArubaCentral\Classic\Requests\Topology\Topology;

use spkm\ArubaCentral\Classic\Data\Topology\TopologyDetails;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get topology details of a site.: GET /topology_external_api/{site_id}.
 */
class DisplayTopologyRequest extends ItemRequest
{
    protected ?string $dto = TopologyDetails::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $siteId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/topology_external_api/'.rawurlencode((string) $this->siteId);
    }
}
