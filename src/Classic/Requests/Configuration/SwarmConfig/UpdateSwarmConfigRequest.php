<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\SwarmConfig;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update an existing swarm config.: POST /configuration/v2/swarm_config/{guid}.
 *
 * Body: name, ip_address, timezone_name, timezone_hr, timezone_min.
 */
class UpdateSwarmConfigRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $guid, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v2/swarm_config/'.rawurlencode((string) $this->guid);
    }
}
