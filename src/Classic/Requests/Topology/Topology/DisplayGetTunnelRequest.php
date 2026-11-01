<?php

namespace spkm\ArubaCentral\Classic\Requests\Topology\Topology;

use spkm\ArubaCentral\Classic\Data\Topology\TunnelResponseDetails;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get tunnel details.: GET /topology_external_api/tunnels/{site_id}.
 */
class DisplayGetTunnelRequest extends ItemRequest
{
    protected ?string $dto = TunnelResponseDetails::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $siteId, protected string $tunnelMapNames, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/topology_external_api/tunnels/'.rawurlencode((string) $this->siteId);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['tunnel_map_names' => $this->tunnelMapNames, ...parent::defaultQuery()];
    }
}
