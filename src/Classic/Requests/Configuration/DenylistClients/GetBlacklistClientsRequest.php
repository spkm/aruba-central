<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\DenylistClients;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get all denylist client mac address in device.: GET /configuration/v1/swarm/{device_id}/blacklisting.
 */
class GetBlacklistClientsRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/swarm/'.rawurlencode((string) $this->deviceId).'/blacklisting';
    }
}
