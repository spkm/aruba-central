<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\SwarmConfig;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get an existing swarm config.: GET /configuration/v2/swarm_config/{guid}.
 */
class GetSwarmConfigRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $guid, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v2/swarm_config/'.rawurlencode((string) $this->guid);
    }
}
