<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Swarm;

use spkm\ArubaCentral\Classic\Data\Monitoring\Swarm;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Swarm Details: GET /monitoring/v1/swarms/{swarm_id}.
 */
class GetSwarmRequest extends ItemRequest
{
    protected ?string $dto = Swarm::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $swarmId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/swarms/'.rawurlencode((string) $this->swarmId);
    }
}
