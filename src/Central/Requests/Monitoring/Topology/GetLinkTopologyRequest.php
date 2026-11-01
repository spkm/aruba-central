<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Topology;

use spkm\ArubaCentral\Central\Data\Monitoring\Topology;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Returns topology details for the given site.: GET /network-monitoring/v1/topology/{site-id}.
 */
class GetLinkTopologyRequest extends ItemRequest
{
    protected ?string $dto = Topology::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $siteId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/topology/'.rawurlencode((string) $this->siteId);
    }
}
