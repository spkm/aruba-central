<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Network;

use spkm\ArubaCentral\Classic\Data\Monitoring\NetworkRecord;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Network details: GET /monitoring/v2/networks/{network_name}.
 *
 * Query options: group, swarm_id, label, site.
 */
class GetNetworkRequest extends ItemRequest
{
    protected ?string $dto = NetworkRecord::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $networkName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v2/networks/'.rawurlencode((string) $this->networkName);
    }
}
