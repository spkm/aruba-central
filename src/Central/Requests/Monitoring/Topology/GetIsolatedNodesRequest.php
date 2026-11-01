<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Topology;

use spkm\ArubaCentral\Central\Data\Monitoring\IsolatedNodes;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Returns isolated devices for the given site.: GET /network-monitoring/v1/isolated-devices/{site-id}.
 */
class GetIsolatedNodesRequest extends ItemRequest
{
    protected ?string $dto = IsolatedNodes::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $siteId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/isolated-devices/'.rawurlencode((string) $this->siteId);
    }
}
